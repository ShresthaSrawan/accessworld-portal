<?php
    namespace App\Awt\Asa;

    use GuzzleHttp\Client;
    use GuzzleHttp\Exception\ClientException;

    class AsaService
    {
        const DEFAULT_CURRENCY = "USD";
        protected $client;
        protected $response;
        protected $resellerId;
        protected $baseURI;
        protected $emailAddress;
        protected $password;
        protected $accessToken;
        protected $userId;
        protected $resellerTldData;

        public function __construct ()
        {
            $this->setBaseURI ( config ( 'awt.asa.host' ) );
            $this->setResellerId ( config ( 'awt.asa.reseller-id' ) );
            $this->setEmailAddress ( config ( 'awt.asa.email-address' ) );
            $this->setPassword ( config ( 'awt.asa.password' ) );
            $this->connect ();
        }

        /**
         * @return Client
         * @throws \Exception
         */
        public function connect ()
        {
            $this->client = new Client( [
                'base_uri' => $this->getBaseURI (),
                'timeout'  => 10,
                'verify'   => false,
                'defaults' => [
                    'headers' => ['content-type' => 'application/json']
                ]
            ] );
            return $this;
        }

        public function getBaseURI ()
        {
            return $this->baseURI;
        }

        public function setBaseURI ( $baseURI )
        {
            $this->baseURI = $baseURI;
        }

        /**
         * @param bool $resellerId
         * @param bool $emailAddress
         * @param bool $password
         * @return mixed
         * @throws \Exception
         */
        public function login ( $resellerId = false, $emailAddress = false, $password = false )
        {
            $this->response = $this->request ( 'POST', 'auth/token', [
                "json" => [
                    "resellerId"   => $resellerId ?: $this->getResellerId (),
                    "emailAddress" => $emailAddress ?: $this->getEmailAddress (),
                    "password"     => $password ?: $this->getPassword ()
                ]
            ] );

            $this->setAccessToken ( $this->getResponse ()->accessToken );
            $this->setUserId ( $this->getResponse ()->userId );

            return $this;
        }

        private function request ()
        {
            try {
                return call_user_func_array ( [$this->client, 'request'], func_get_args () );
            } catch (ClientException $e) {
                return $e->getResponse (); //->getBody ()->getContents ();
            }
        }

        public function getResellerId ()
        {
            return $this->resellerId;
        }

        public function setResellerId ( $resellerId )
        {
            $this->resellerId = $resellerId;
        }

        public function getEmailAddress ()
        {
            return $this->emailAddress;
        }

        public function setEmailAddress ( $emailAddress )
        {
            $this->emailAddress = $emailAddress;
        }

        public function getPassword ()
        {
            return $this->password;
        }

        public function setPassword ( $password )
        {
            $this->password = $password;
        }

        public function getResponse ( $raw = false )
        {
            if ( $raw )
                return json_decode ( $this->response );
            return json_decode ( $this->response->getBody () );
        }

        public function addToCart ( $description, $periodMonths, $qty = 1 )
        {
            $pricing = $this->getResellerPricings ( $periodMonths );
            if ( $pricing ) {
                $this->response = $this->request ( 'POST', 'v1/cartItems', [
                    'headers' => [
                        'Authorization' => $this->getAccessToken ()
                    ],
                    'auth'    => $this->getAccessToken (),
                    "json"    => [
                        "cart"                    => "/{$this->getCart()->id}",
                        "description"             => $description,
                        "emailForwardIncluded"    => true,
                        "freeBasekitTierIncluded" => true,
                        "quantity"                => $qty,
                        "resellerPricing"         => "/{$pricing->id}"
                    ]
                ] );
            }

            return $this;
        }

        public function getResellerPricings ( $periodMonths = false, $purchaseType = "SUBSCRIBE" )
        {
            $this->response = $this->request ( 'GET', '/v1/resellers/' . $this->getResellerId () . '/resellerPricings', [
                'headers' => [
                    'Authorization' => $this->getAccessToken (),
                    'Content-type'  => 'application/json'
                ]
            ] );

            $price = [];

            foreach ($this->getResponse ()->_embedded->resellerPricings as $resellerPricing) {
                if ( $periodMonths ) {
                    if ( $resellerPricing->_embedded->tldPhase->tldId == $this->getResellerDomain ()->id
                        && $resellerPricing->periodMonths == $periodMonths
                        && $resellerPricing->currency == self::DEFAULT_CURRENCY
                        && $resellerPricing->purchaseType == strtoupper ( $purchaseType )
                    )
                        return $resellerPricing;
                } else {
                    if ( $resellerPricing->_embedded->tldPhase->tldId == $this->getResellerDomain ()->id )
                        array_push ( $price, $resellerPricing );
                }
            }
            return $price;
        }

        public function getAccessToken ()
        {
            return $this->accessToken;
        }

        public function setAccessToken ( $accessToken )
        {
            $this->accessToken = $accessToken;
        }

        public function getResellerDomain ()
        {
            return $this->resellerTldData;
        }

        public function getCart ()
        {
            $this->response = $this->request ( 'GET', '/v1/users/' . $this->getUserId () . '/cart', [
                'headers' => [
                    'Authorization' => $this->getAccessToken (),
                    'Content-type'  => 'application/json'
                ]
            ] );

            return $this->getResponse ();
        }

        public function getUserId ()
        {
            return $this->userId;
        }

        public function setUserId ( $userId )
        {
            $this->userId = $userId;
        }

        public function removeFromCart ( $cartItemId )
        {
            return $this->request ( 'DELETE', 'cartItems/' . $cartItemId );
        }

        public function getNameServers ()
        {
            $this->response = $this->request ( 'GET', 'resellers/' . $this->getResellerId () . '/resellerDomainNameServers', [
                'headers' => [
                    'Authorization' => $this->getAccessToken (),
                    'Content-type'  => 'application/json'
                ]
            ] );
        }

        public function setResellerDomains ( $domain )
        {
            $this->response = $this->request ( 'GET', 'v1/resellers/' . $this->getResellerId () . '/resellerTldDatas', [
                'headers' => [
                    'Authorization' => $this->getAccessToken (),
                    'Content-type'  => 'application/json'
                ]
            ] );
            $tlds = $this->getResponse ();

            foreach ($tlds->_embedded->resellerTldDatas as $tld) {
                if ( $tld->_embedded->tld->name == $domain ) {
                    $this->resellerTldData = $tld->_embedded->tld;
                    break;
                }
            }

            return $this;
        }

        public function getDomainContacts($domainId)
        {
            $this->response = $this->request ( 'GET', '/v1/domains/' . $domainId . '/domainContacts', [
                'headers' => [
                    'Authorization' => $this->getAccessToken (),
                    'Content-type'  => 'application/json'
                ]
            ] );

            return $this->getResponse ();
        }

        public function createDomainContact ( $data, $type )
        {
            $this->response = $this->request ( 'POST', '/v1/domainContacts/', [
                'headers' => [
                    'Authorization' => $this->getAccessToken ()
                ],
                "json"    => [
                    "domain"           => "/" . $this->getResellerDomain ()->id,
                    "firstName"        => $data[ 'first_name' ],
                    "lastName"         => $data[ 'last_name' ],
                    "emailAddress"     => $data[ 'email' ],
                    "address"          => [
                        "address1"    => $data[ 'address1' ],
                        "address2"    => $data[ 'address2' ],
                        "city"        => $data[ 'city' ],
                        "state"       => $data[ 'state' ],
                        "postcode"    => $data[ 'postcode' ],
                        "countryCode" => $data[ 'country_code' ]
                    ],
                    "phoneCountryCode" => $data[ 'phone_country_code' ],
                    "phoneArea"        => $data[ 'phone_area' ],
                    "phoneNumber"      => $data[ 'phone_number' ],
                    "companyName"      => $data[ 'company_name' ],
                    "contactType"      => $type
                ]
            ] );

            return $this;
        }

        public function createCustomerAccount ( $email, $password, $firstName, $lastName )
        {
            $this->response = $this->request ( 'POST', 'v1/users', [
                'headers' => [
                    'Authorization' => $this->getAccessToken ()
                ],
                "json"    => [
                    "reseller"     => "/{$this->getResellerId()}",
                    "emailAddress" => $email,
                    "newPassword"  => $password,
                    "userDetails"  => [
                        "firstName" => $firstName,
                        "lastName"  => $lastName
                    ]
                ]
            ] );

            return $this;
        }

        public function resendVerificationEmail ()
        {
            return $this->request ( 'POST', '/v1/users/resendVerification', [
                'headers' => [
                    'Authorization' => $this->getAccessToken ()
                ]
            ] );
        }

        public function getTLDSettings ()
        {
            $this->response = $this->request ( 'GET', '/v1/resellers/' . $this->getResellerId () . '/resellerTldDatas', [
                'headers' => [
                    'Authorization' => $this->getAccessToken (),
                    'Content-type'  => 'application/json'
                ]
            ] );

            return $this;
        }

        public function checkAvailability ( $domain )
        {
            $this->response = $this->request ( 'POST', '/v1/domains/search', [
                'headers' => [
                    'Authorization' => $this->getAccessToken (),
                    'Content-type'  => 'application/json'
                ],
                'json'    => [
                    "includePremium" => true,
                    "domainSearches" => [
                        [
                            "domainName"     => $domain,
                            "idnLanguageTag" => null,
                            "checkType"      => "CACHED"
                        ]
                    ]
                ]
            ] );

            return $this->getResponse ();
        }

        public function getCards()
        {
            $this->response = $this->request ( 'GET', '/v1/users/' . $this->getUserId () . '/cards', [
                'headers' => [
                    'Authorization' => $this->getAccessToken (),
                    'Content-type'  => 'application/json'
                ]
            ] );

            return $this->getResponse ();
        }

        public function saveCard()
        {
            $this->response = $this->request ( 'POST', '/v1/users/' . $this->getUserId () . '/cards', [
                'headers' => [
                    'Authorization' => $this->getAccessToken (),
                    'Content-type'  => 'application/json'
                ],
                'json'  => [
                    "name"              => "John Doe",
                    "expiryMonth"       => 1,
                    "expiryYear"        => 2017,
                    "address"           =>  [
                        "address1"          => "1 Main Street",
                        "address2"          => "Townville",
                        "city"              => "Dublin",
                        "countryCode"       => "IE",
                        "state"             => "Co Dublin",
                        "postcode"          => "45325"
                    ],
                    "firstName"         => "John",
                    "lastName"          => "Doe",
                    "phoneCountryCode"  => "+353",
                    "phoneArea"         => "01",
                    "phoneNumber"       => "3445222",
                    "emailAddress"      => "john.doe@afilias.info",
                    "last4Digits"       => "4242",
                    "type"              => "Visa",
                    "providerId"        => "tok_16xYg7AIQXfWaWHa6myEkhdd",
                    "enabled"           => true
                ]
            ] );

            return $this->getResponse ();
        }

        public function getOrders()
        {
            $this->response = $this->request ( 'GET', '/v1/users/' . $this->getUserId () . '/orders', [
                'headers' => [
                    'Authorization' => $this->getAccessToken (),
                    'Content-type'  => 'application/json'
                ]
            ] );

            return $this->getResponse ();
        }

        public function createOrder ($cardId = null, $vat = 13)
        {
            if(is_null($cardId))
                $cardId = intval($this->getCards()->_embedded->cards[0]->id);

            $this->response = $this->request ( 'POST', '/v1/orders', [
                'headers' => [
                    'Authorization' => $this->getAccessToken (),
                    'Content-type'  => 'application/json'
                ],
                'json'    => [  
                   "vatTotal" => $vat,
                   "domainContacts" =>[  
                        [  
                            "contactType" => "REGISTRANT",
                            "firstName" => "Mark",
                            "lastName" => "Anderson",
                            "address" =>  [  
                                "address1" => "1 The Road",
                                "address2" => "Townville",
                                "city" => "Town",
                                "countryCode" => "IE",
                                "state" => "Dublin",
                                "postcode" => "12345"
                            ],
                            "languageCode" => "en",
                            "currency" => "USD",
                            "phoneCountryCode" => "+353",
                            "phoneArea" => "01",
                            "phoneNumber" => "1234567",
                            "paymentProviderId" => null,
                            "primaryCardId" => null,
                            "emailAddress" => "mark.anderson@afilias.info",
                            "companyName" => "Acme Inc.",
                            "companyNameCertification" => true
                        ],
                        [  
                            "contactType" => "ADMIN",
                            "firstName" => "Mark",
                            "lastName" => "Anderson",
                            "address" =>  [  
                                "address1" => "1 The Road",
                                "address2" => "Townville",
                                "city" => "Town",
                                "countryCode" => "IE",
                                "state" => "Dublin",
                                "postcode" => "12345"
                            ],
                            "languageCode" => "en",
                            "currency" => "USD",
                            "phoneCountryCode" => "+353",
                            "phoneArea" => "01",
                            "phoneNumber" => "1234567",
                            "paymentProviderId" => null,
                            "primaryCardId" => null,
                            "emailAddress" => "mark.anderson@afilias.info",
                            "companyName" => "Acme Inc.",
                            "companyNameCertification" => true
                        ],
                        [  
                            "contactType" => "TECHNICAL",
                            "firstName" => "Mark",
                            "lastName" => "Anderson",
                            "address" =>  [  
                                "address1" => "1 The Road",
                                "address2" => "Townville",
                                "city" => "Town",
                                "countryCode" => "IE",
                                "state" => "Dublin",
                                "postcode" => "12345"
                            ],
                            "languageCode" => "en",
                            "currency" => "USD",
                            "phoneCountryCode" => "+353",
                            "phoneArea" => "01",
                            "phoneNumber" => "1234567",
                            "paymentProviderId" => null,
                            "primaryCardId" => null,
                            "emailAddress" => "mark.anderson@afilias.info",
                            "companyName" => "Acme Inc.",
                            "companyNameCertification" => true
                        ],
                        [  
                            "contactType" => "BILLING",
                            "firstName" => "Mark",
                            "lastName" => "Anderson",
                            "address" =>  [  
                                "address1" => "1 The Road",
                                "address2" => "Townville",
                                "city" => "Town",
                                "countryCode" => "IE",
                                "state" => "Dublin",
                                "postcode" => "12345"
                            ],
                            "languageCode" => "en",
                            "currency" => "USD",
                            "phoneCountryCode" => "+353",
                            "phoneArea" => "01",
                            "phoneNumber" => "1234567",
                            "paymentProviderId" => null,
                            "primaryCardId" => null,
                            "emailAddress" => "mark.anderson@afilias.info",
                            "companyName" => "Acme Inc.",
                            "companyNameCertification" => true
                        ]
                    ],
                    "billingAddress" =>  [  
                        "address1" => "1 The Road",
                        "address2" => "Townville",
                        "city" => "Town",
                        "countryCode" => "IE",
                        "state" => "Dublin",
                        "postcode" => "12345"
                   ]
                ]
            ] );

            return $this->getResponse ();
        }
    }