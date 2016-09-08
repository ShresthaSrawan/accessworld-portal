(function () {
  "use strict";
  $.validator.setDefaults({
    highlight: function (element) {
      $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function (element) {
      $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function (error, element) {
      error.insertAfter(element);
    }
  });
}());
$(".domain-validate").validate({
  rules: {
    domain: {
      required: true,
      domain: true
    },
  },
  messages: {
    domain:{
      domain: "Must be a valid domain",
    }
  },
  submitHandler: function(form) {
    if( $(form).data('submit') == undefined ) {

      form.submit();

    }
  }
});
$.validator.addMethod("domain", function(value) {
  // strip off "http://" and/or "www."
  value = value.replace("http://","");
  value = value.replace("www.","");

  var arr = new Array('.abogado', '.ac', '.academy', '.accountant', '.accountants', '.actor', '.adult', '.ae', '.aero', '.af', '.ag', '.agency', '.airforce', '.alsace', '.am', '.amsterdam', '.apartments', '.archi', '.army', '.as', '.asia', '.asn.au', '.associates', '.at', '.attorney', '.auction', '.audio', '.auto', '.band', '.bar', '.barcelona', '.bargains', '.bayern', '.be', '.beer', '.berlin', '.best', '.bet', '.bid', '.bike', '.bingo', '.bio', '.biz', '.biz.ki', '.biz.pl', '.black', '.blackfriday', '.blue', '.boutique', '.brussels', '.build', '.builders', '.business', '.buzz', '.bz', '.bzh', '.ca', '.cab', '.cafe', '.camera', '.camp', '.capetown', '.capital', '.car', '.cards', '.care', '.careers', '.cars', '.casa', '.cash', '.casino', '.cat', '.catering', '.cc', '.cd', '.center', '.ceo', '.ch', '.chat', '.cheap', '.christmas', '.church', '.city', '.cl', '.claims', '.cleaning', '.clickSALE', '.clinic', '.clothing', '.cloudSALE', '.club', '.cm', '.co*SALE', '.co.ag', '.co.at', '.co.cm', '.co.gg', '.co.gl', '.co.gy', '.co.hu', '.co.il', '.co.im', '.co.in', '.co.je', '.co.kr', '.co.lc', '.co.ma', '.co.nz', '.co.uk', '.co.ve', '.co.za', '.coach', '.codes', '.coffee', '.college', '.cologne', '.com', '.com.af', '.com.ag', '.com.ai', '.com.ar', '.com.au', '.com.br', '.com.bz', '.com.cm', '.com.co', '.com.ec', '.com.es', '.com.gl', '.com.gr', '.com.gy', '.com.hn', '.com.hr', '.com.ht', '.com.im', '.com.ki', '.com.lc', '.com.lv', '.com.ly', '.com.mx', '.com.my', '.com.pe', '.com.ph', '.com.pl', '.com.pr', '.com.pt', '.com.ro', '.com.ru', '.com.sb', '.com.sc', '.com.so', '.com.tw', '.com.ua', '.com.uy', '.com.vc', '.com.ve', '.community', '.company', '.computer', '.condos', '.construction', '.consulting', '.contractors', '.cooking', '.cool', '.coop', '.corsica', '.country', '.coupons', '.courses', '.credit', '.creditcard', '.cricket', '.cruises', '.cx', '.cymru', '.cz', '.dance', '.date', '.dating', '.de', '.deals', '.degree', '.delivery', '.democrat', '.dental', '.dentist', '.desi', '.design', '.diamonds', '.diet', '.digital', '.direct', '.directory', '.discount', '.dk', '.dog', '.domains', '.download', '.durban', '.earth', '.ec', '.edu.gr', '.edu.pl', '.education', '.email', '.energy', '.engineer', '.engineering', '.enterprises', '.equipment', '.es', '.estate', '.eu', '.events', '.exchange', '.expert', '.exposed', '.express', '.fail', '.faith', '.familySALE', '.fans', '.farm', '.fashion', '.feedback', '.fi', '.film', '.fin.ec', '.finance', '.financial', '.firm.in', '.fish', '.fishing', '.fit', '.fitness', '.flights', '.florist', '.flowers', '.fm', '.football', '.forsale', '.foundation', '.fr', '.frl', '.fund', '.furniture', '.futbol', '.fyi', '.gallery', '.game', '.garden', '.gd', '.gen.in', '.gg', '.gift', '.gifts', '.gives', '.gl', '.glass', '.global', '.gold', '.golf', '.gr', '.graphics', '.gratis', '.green', '.gripe', '.group', '.gs', '.guide', '.guitars', '.guru', '.gy', '.hamburg', '.haus', '.healthcare', '.help', '.hiphop', '.hiv', '.hk', '.hm', '.hn', '.hockey', '.holdings', '.holiday', '.horse', '.hosting', '.hostSALE', '.house', '.how', '.ht', '.hu', '.id.au', '.idv.tw', '.im', '.immo', '.immobilien', '.in', '.ind.in', '.industries', '.info', '.info.ec', '.info.ht', '.info.ki', '.info.pl', '.ink', '.institute', '.insure', '.international', '.investments', '.io', '.irish', '.is', '.ist', '.istanbul', '.it', '.je', '.jetzt', '.jewelry', '.jobs', '.joburg', '.jp', '.juegos', '.kaufen', '.kg', '.kim', '.kitchen', '.kiwi', '.koeln', '.kr', '.l.lc', '.la', '.land', '.law', '.lawyer', '.lc', '.lease', '.legal', '.lgbt', '.li', '.life', '.lighting', '.limited', '.limo', '.linkSALE', '.liveSALE', '.loan', '.loans', '.lol', '.london', '.love', '.lt', '.ltd.uk', '.ltda', '.lu', '.luxury', '.lv', '.ly', '.ma', '.maison', '.management', '.market', '.marketing', '.mba', '.md', '.me*SALE', '.me.uk', '.med.ec', '.media', '.melbourne', '.memorial', '.men', '.menu', '.miami', '.mn', '.mobi.ki', '.mobiSALE', '.moda', '.moe', '.mom', '.money', '.mortgage', '.movie', '.ms', '.mu', '.mx', '.my', '.nagoya', '.name', '.name.my', '.navy', '.net', '.net.af', '.net.ag', '.net.ai', '.net.au', '.net.cm', '.net.co', '.net.ec', '.net.gg', '.net.gl', '.net.gr', '.net.gy', '.net.hn', '.net.ht', '.net.im', '.net.in', '.net.ki', '.net.lc', '.net.my', '.net.nz', '.net.pe', '.net.ph', '.net.pl', '.net.sb', '.net.sc', '.net.so', '.net.uk', '.net.vc', '.net.za', '.network', '.news', '.ngo', '.ninja', '.nl', '.no', '.nom.ag', '.nom.co', '.nom.es', '.nom.pl', '.nrw', '.nu', '.nyc', '.nz', '.off.ai', '.one', '.onlineSALE', '.or.at', '.org', '.org.af', '.org.ag', '.org.ai', '.org.au', '.org.es', '.org.gg', '.org.gl', '.org.gr', '.org.hn', '.org.ht', '.org.im', '.org.in', '.org.lc', '.org.my', '.org.nz', '.org.ph', '.org.pl', '.org.sb', '.org.sc', '.org.so', '.org.tw', '.org.uk', '.org.vc', '.org.za', '.p.lc', '.paris', '.partners', '.parts', '.party', '.pe', '.pet', '.ph', '.photo', '.photography', '.photos', '.physio', '.pics', '.pictures', '.pink', '.pizza', '.pl', '.place', '.plc.uk', '.plumbing', '.plus', '.pm', '.poker', '.porn', '.pressSALE', '.pro*SALE', '.pro.ec', '.productions', '.promo', '.properties', '.property', '.protection', '.pt', '.pub', '.pw', '.qa', '.quebec', '.racing', '.re', '.recipes', '.red', '.rehab', '.reise', '.reisen', '.rent', '.rentals', '.repair', '.report', '.republican', '.rest', '.restaurant', '.review', '.reviews', '.rio', '.rip', '.ro', '.rocksSALE', '.rodeo', '.ru', '.ruhr', '.run', '.sale', '.salon', '.sarl', '.sc', '.school', '.schule', '.science', '.scot', '.se', '.security', '.services', '.sex', '.sexy', '.sg', '.sh', '.shoes', '.shop.pl', '.show', '.si', '.singles', '.siteSALE', '.ski', '.so', '.soccer', '.socialSALE', '.software', '.solar', '.solutions', '.soy', '.spaceSALE', '.sr', '.srl', '.st', '.studio', '.study', '.style', '.sucks', '.supplies', '.supply', '.support', '.surf', '.surgery', '.sx', '.sydney', '.systems', '.tattoo', '.tax', '.taxi', '.team', '.technology', '.techSALE', '.tel', '.tel.ki', '.tennis', '.tf', '.theater', '.theatre', '.tienda', '.tips', '.tires', '.tirol', '.tk', '.tl', '.tm', '.to', '.today', '.tokyo', '.tools', '.topSALE', '.tours', '.town', '.toys', '.trade', '.training', '.travel', '.tv', '.tw', '.uk', '.university', '.uno', '.usSALE', '.vacations', '.vc', '.vegas', '.ventures', '.vet', '.viajes', '.video', '.villas', '.vin', '.vip', '.vision', '.vlaanderen', '.vodka', '.vote', '.voto', '.voyage', '.wales', '.watch', '.waw.pl', '.web.za', '.webcam', '.websiteSALE', '.wedding', '.wf', '.wien', '.wiki', '.win', '.wine', '.work', '.works', '.world', '.ws', '.wtf', '.xxx', '.xyzSALE', '.yoga', '.yokohama', '.yt', '.zone', '.online');

  var is_extension_valid = true;
  var last_dot = value.lastIndexOf( "." );
  var domain = value.substring( 0, last_dot );
  var ext = value.substring( last_dot, value.length);

  if( last_dot > 2 && last_dot < 57 ){
    for( var i=0; i < arr.length; i++ ){
      if(ext == arr[i]){
        is_extension_valid = true;
        break;
      } else {
        is_extension_valid = false;
      }
    }
    if(is_extension_valid == false){
      //Invalid extension
      return false;
    } else {
      for(var j = 0; j < domain.length; j++) {
        var begining_string = domain.charAt(j);
        var cc = begining_string.charCodeAt(0);
        if((cc > 47 && cc < 59) || (cc > 64 && cc < 91) || (cc > 96 && cc < 123) || cc == 45 || cc == 46){
          if((j==0 || j==domain.length-1) && (cc == 45 || cc == 46)){
            //Shouldn't start with '-' or '.'
            return false;
          }
        } else {
          //Shouldn't contain special character
          return false;
        }
      }
    }
  }
  else
  {
    //Invalid domain
    return false;
  }
  return true;

  // return /^[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9]\.[a-zA-Z]{2,}$/.test(value); // consists of only these
});
//# sourceMappingURL=domain.validation.js.map
