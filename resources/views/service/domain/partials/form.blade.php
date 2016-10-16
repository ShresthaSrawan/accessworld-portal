<h1>Configure <em>{{ $domain }}</em></h1>
<h2>Fill up the information for your domain.</h2>
{{ Form::hidden('options[domain]', $domain) }}
<label>
    <strong>Registration Period</strong>
</label>
<p>
    <em>*. Note that price will change depending upon the number of duration you choose.</em>
</p>
{{ Form::select('options[period]', $domainOptions ,old('options.period'), [ 'class' => 'col-md-6 form-control' ]) }}
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-sm-12">
                <h3>
                    Contact Information
                </h3>
            </div>
            <div class="col-sm-12">
                <div class="checkbox checkbox-styled">
                    <label>
                        <input type="checkbox" value="1" id="is_different">
                        <span>Have different data for <strong>Owner, Administrator, Billing and Technical.</strong></span>
                    </label>
                </div>
            </div>
        </div>
        <div class="row contact-form-group">
            <div class="col-sm-10 col-sm-offset-1 contact-form-oabt">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" required="required" value="{{ old('options.oabt.first_name') }}"
                                   name="options[oabt][first_name]"
                                   class="form-control oabt first_name" maxlength="64">
                            <label>First Name</label>
                        </div>
                        <div class="form-group">
                            <input type="text" required="required" value="{{ old('options.oabt.last_name') }}"
                                   name="options[oabt][last_name]"
                                   class="form-control oabt last_name" maxlength="64">
                            <label>Last Name</label>
                        </div>
                        <div class="form-group">
                            <input type="text" required="required" value="{{ old('options.oabt.org_name') }}"
                                   name="options[oabt][org_name]"
                                   class="form-control oabt org_name" maxlength="64">
                            <label>Organization Name</label>
                        </div>
                        <div class="form-group">
                            <input type="text" required="required" value="{{ old('options.oabt.address1') }}"
                                   name="options[oabt][address1]"
                                   class="form-control oabt address1" maxlength="100">
                            <label>Address 1</label>
                        </div>
                        <div class="form-group">
                            <input type="text" required="required" value="{{ old('options.oabt.city') }}"
                                   name="options[oabt][city]" class="form-control oabt city"
                                   maxlength="64">
                            <label>City</label>
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <div>
                                {{ Form::select('options[oabt][country]', $countries, old('options.oabt.country'),
                                ['class' => 'form-control oabt country']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="text" value="{{ old('options.oabt.state') }}"
                                       name="options[oabt][state]"
                                       class="form-control oabt state" maxlength="64">
                                <label>State</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" required="required" value="{{ old('options.oabt.postal_code') }}"
                                   name="options[oabt][postal_code]"
                                   class="form-control oabt postal_code" maxlength="32">
                            <label>Zip/Postal Code</label>
                        </div>
                        <div class="form-group">
                            <input type="text" required="required" value="{{ old('options.oabt.phone') }}"
                                   name="options[oabt][phone]" class="form-control oabt phone"
                                   maxlength="20">
                            <label>Phone</label>
                        </div>
                        <div class="form-group">
                            <input type="email" value="{{ old('options.oabt.email') }}"
                                   name="options[oabt][email]" class="form-control oabt email"
                                   maxlength="255">
                            <label>Email</label>
                        </div>
                    </div>
                    <div class="col-md-8">
                      <!-- Image -->
                    </div>
                </div>
            </div>
            <div class="col-md-3 contact-form-different hidden">
                <h3>Owner</h3>
                <div class="form-group">
                    <select class="form-control copyVal" data-to="owner">
                        <option value="">Make same as...</option>
                        <option value="administrator">
                            Same as Administrator information
                        </option>
                        <option value="billing">
                            Same as Billing information
                        </option>
                        <option value="technical">
                            Same as Technical information
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.owner.first_name') }}"
                           name="options[owner][first_name]"
                           class="form-control owner first_name" maxlength="64">
                    <label>First Name</label>
                </div>
                <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.owner.last_name') }}"
                           name="options[owner][last_name]"
                           class="form-control owner last_name" maxlength="64">
                    <label>Last Name</label>
                </div>
                <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.owner.org_name') }}"
                           name="options[owner][org_name]"
                           class="form-control owner org_name" maxlength="64">
                    <label>Organization Name</label>
                </div>
                <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.owner.address1') }}"
                           name="options[owner][address1]"
                           class="form-control owner address1" maxlength="100">
                    <label>Address 1</label>
                </div>
                <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.owner.city') }}"
                           name="options[owner][city]" class="form-control owner city"
                           maxlength="64">
                    <label>City</label>
                </div>
                <div class="form-group">
                    <label>Country</label>
                    <div>
                        {{ Form::select('options[owner][country]', $countries, old('options.owner.country'), ['class' =>
                        'form-control owner country']) }}
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <input type="text" value="{{ old('options.owner.state') }}"
                               name="options[owner][state]"
                               class="form-control owner state" maxlength="64">
                        <label>State</label>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.owner.postal_code') }}"
                           name="options[owner][postal_code]"
                           class="form-control owner postal_code" maxlength="32">
                    <label>Zip/Postal Code</label>
                </div>
                <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.owner.phone') }}"
                           name="options[owner][phone]" class="form-control owner phone"
                           maxlength="20">
                    <label>Phone</label>
                </div>
                <div class="form-group">
                    <input type="email" value="{{ old('options.owner.email') }}"
                           name="options[owner][email]" class="form-control owner email"
                           maxlength="255">
                    <label>Email</label>
                </div>
            </div>
            <div class="col-md-3 contact-form-different hidden">
                <h3>Administrator</h3>
                <div class="form-group">
                    <select class="form-control copyVal"
                            data-to="administrator">
                        <option value="">Make same as...</option>
                        <option value="owner">
                            Same as Owner information
                        </option>
                        <option value="billing">
                            Same as Billing information
                        </option>
                        <option value="technical">
                            Same as Technical information
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.admin.first_name') }}"

                           name="options[admin][first_name]"
                           class="form-control administrator first_name" maxlength="64">
                    <label>First Name</label>
                </div>
                <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.admin.last_name') }}"

                           name="options[admin][last_name]"
                           class="form-control administrator last_name" maxlength="64">
                    <label>Last Name</label>
                </div>
                <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.admin.org_name') }}"

                           name="options[admin][org_name]"
                           class="form-control administrator org_name" maxlength="64">
                    <label>Organization Name</label>
                </div>
                <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.admin.address1') }}"

                           name="options[admin][address1]"
                           class="form-control administrator address1" maxlength="100">
                    <label>Address 1</label>
                </div>
                <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.admin.city') }}"
                           name="options[admin][city]"
                           class="form-control administrator city" maxlength="64">
                    <label>City</label>
                </div>
                <div class="form-group">
                    <label>Country</label>
                    <div>
                        {{ Form::select('options[admin][country]', $countries, old('options.admin.country'), ['class' =>
                        'form-control administrator country']) }}
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <input type="text" value="{{ old('options.admin.state') }}"
                               name="options[admin][state]"
                               class="form-control administrator state" maxlength="64">
                        <label>State</label>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.admin.postal_code') }}"

                           name="options[admin][postal_code]"
                           class="form-control administrator postal_code"
                           maxlength="32">
                    <label>Zip/Postal Code</label>
                </div>
                <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.admin.phone') }}"

                           name="options[admin][phone]"
                           class="form-control administrator phone" maxlength="20">
                    <label>Phone</label>
                </div>
                <div class="form-group">
                    <input type="email" value="{{ old('options.admin.email') }}"
                           name="options[admin][email]"
                           class="form-control administrator email" maxlength="255">
                    <label>Email</label>
                </div>
            </div>
            <div class="col-md-3 contact-form-different hidden">
                <h3>Billing</h3>
                <div class="form-group">
                    <select class="form-control copyVal"
                            data-to="billing">
                        <option value="">Make same as...</option>
                        <option value="owner">
                            Same as Owner information
                        </option>
                        <option value="administrator">
                            Same as Administrator information
                        </option>
                        <option value="technical">
                            Same as Technical information
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.billing.first_name') }}"
                           name="options[billing][first_name]"
                           class="form-control billing first_name" maxlength="64">
                    <label>First Name</label>
                </div>
                <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.billing.last_name') }}"
                           name="options[billing][last_name]"
                           class="form-control billing last_name" maxlength="64">
                    <label>Last Name</label>
                </div>
                <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.billing.org_name') }}"
                           name="options[billing][org_name]"
                           class="form-control billing org_name" maxlength="64">
                    <label>Organization Name</label>
                </div>
                <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.billing.address1') }}"
                           name="options[billing][address1]"
                           class="form-control billing address1" maxlength="100">
                    <label>Address 1</label>
                </div>
                <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.billing.city') }}"
                           name="options[billing][city]"
                           class="form-control billing city" maxlength="64">
                    <label>City</label>
                </div>
                <div class="form-group">
                    <label>Country</label>
                    <div>
                        {{ Form::select('options[billing][country]', $countries, old('options.billing.country'),
                        ['class' => 'form-control billing country']) }}
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <input type="text" value="{{ old('options.billing.state') }}"
                               name="options[billing][state]"
                               class="form-control billing state" maxlength="64">
                        <label>State</label>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.billing.postal_code') }}"

                           name="options[billing][postal_code]"
                           class="form-control billing postal_code" maxlength="32">
                    <label>Zip/Postal Code</label>
                </div>
                <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.billing.phone') }}"
                           name="options[billing][phone]"
                           class="form-control billing phone" maxlength="20">
                    <label>Phone</label>
                </div>
                <div class="form-group">
                    <input type="email" value="{{ old('options.billing.email') }}"
                           name="options[billing][email]"
                           class="form-control billing email" maxlength="255">
                    <label>Email</label>
                </div>
            </div>
            <div class="col-md-3 contact-form-different hidden">
                <h3>Technical</h3>
                <div class="form-group">
                    <select class="form-control copyVal"
                            data-to="technical">
                        <option value="">Make same as...</option>
                        <option value="owner">
                            Same as Owner information
                        </option>
                        <option value="administrator">
                            Same as Administrator information
                        </option>
                        <option value="billing">
                            Same as Billing information
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.tech.first_name') }}"

                           name="options[tech][first_name]"
                           class="form-control technical first_name" maxlength="64">
                    <label>First Name</label>
                </div>
                <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.tech.last_name') }}"

                           name="options[tech][last_name]"
                           class="form-control technical last_name" maxlength="64">
                    <label>Last Name</label>
                </div>
                <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.tech.org_name') }}"
                           name="options[tech][org_name]"
                           class="form-control technical org_name" maxlength="64">
                    <label>Organization Name</label>
                </div>
                <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.tech.address1') }}"
                           name="options[tech][address1]"
                           class="form-control technical address1" maxlength="100">
                    <label>Address 1</label>
                </div>
                <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.tech.city') }}"
                           name="options[tech][city]"
                           class="form-control technical city" maxlength="64">
                    <label>City</label>
                </div>
                <div class="form-group">
                    <label>Country</label>
                    <div>
                        {{ Form::select('options[tech][country]', $countries, old('options.tech.country'), ['class' =>
                        'form-control technical country']) }}
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <input type="text" value="{{ old('options.tech.state') }}"
                               name="options[tech][state]"
                               class="form-control technical state" maxlength="64">
                        <label>State</label>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.tech.postal_code') }}"

                           name="options[tech][postal_code]"
                           class="form-control technical postal_code" maxlength="32">
                    <label>Zip/Postal Code</label>
                </div>
                <div class="form-group">
                    <input type="text" required="required" value="{{ old('options.tech.phone') }}"
                           name="options[tech][phone]"
                           class="form-control technical phone" maxlength="20">
                    <label>Phone</label>
                </div>
                <div class="form-group">
                    <input type="email" value="{{ old('options.tech.email') }}"
                           name="options[tech][email]"
                           class="form-control technical email" maxlength="255">
                    <label>Email</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h3>
                    Nameservers
                </h3>
            </div>
            <div class="col-sm-6">
                <label>Nameserver Provider</label>
                <div class="radio radio-styled">
                    <label>
                        <input type="radio" value="1" name="nameserver_provider" class="nameserver-provider" checked>
                        <span>Use Our Nameservers</span>
                    </label>
                </div>
                <div class="radio radio-styled">
                    <label>
                        <input type="radio" value="2" name="nameserver_provider" class="nameserver-provider">
                        <span>Use Your Own Nameservers</span>
                    </label>
                </div>
            </div>
            <div class="col-sm-6">
                <div>
                    <label>
                        Nameservers
                        <span>(minimum: 2)</span>
                    </label>
                    <div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="text" required="required"
                                           value="{{ old('options.nameserver.0') }}" name="options[nameserver][]"
                                           class="form-control nameserver1"
                                           required>
                                </div>
                                <div class="col-sm-12">
                                    <input type="text" required="required"
                                           value="{{ old('options.nameserver.1') }}" name="options[nameserver][]"
                                           class="form-control nameserver2"
                                           required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <button class="btn btn-large btn-success pull-right" type="submit">
                        <i class="fa fa-shopping-cart"></i>
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>