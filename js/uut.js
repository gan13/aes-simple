/**
 * uut.js
 * Ubah saja sesuka hatimu
 */
  function InputValid(parameter) {
  for (i=0; i<parameter.length; i++) {
      if ( $('#'+parameter[i]+'').val() == '' ) {
        $('#'+parameter[i]+'').css('background-color', '#DFB5B4');
      } else {
        $('#'+parameter[i]+'').removeAttr('style');
      }
    }
  }
  
  function RequiredValid(parameterRv) {
  var a = 0;
  for (i=0; i<parameterRv.length; i++) {
      if ( $('#'+parameterRv[i]+'').val() == '' ) {
        
      } else {
        a = a + 1;
      }
    }
    if (a<parameterRv.length){
      return 0;
      }
    else{
      return 1;
      }
  }
  
  function SimpanData(parameter, url) {
    $.ajax({
      type: 'POST',
      async: true,
      data: parameter,
      dataType: 'text',
      url: url,
      success: function(text) {
        if(text == 0){
          alertify.error('Data gagal disimpan');
        }
        else{
          alertify.success('Data berhasil disimpan');
        }
      }
    });
  }
  
  function HapusAttachment(parameter, url) {
    $.ajax({
      type: 'POST',
      async: true,
      data: parameter,
      dataType: 'text',
      url: url,
      success: function(text) {
        if(text == 1){
          alertify.success('File berhasil dihapus');
        }
        else{
          alertify.error('File gagal dihapus');
        }
      }
    });
  }
  
  function HapusData(parameter, url) {
    $.ajax({
      type: 'POST',
      async: true,
      data: parameter,
      dataType: 'text',
      url: url,
      success: function(text) {
        if(text == 1){
          alertify.success('Data berhasil dihapus');
        }
        else{
          alertify.error('Data gagal dihapus');
        }
      }
    });
  }
  
  function TotalData(url) {
    var result = $.ajax({
        type: "POST",
        url: url,
        param: '{}',
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        async: false,
        success: function (data) {
            // nothing needed here
      }
    }) .responseText ;
    return  result;
  }
  
  function limit_per_page() {
    return 10;
  }
  
  function tanggalan(tanggal) {
    var arr = tanggal.split('-');
		var bln = arr[1];
    if( bln == '01'){
      var b = 'Januari';
    }
    else if ( bln == '02') {
      var b = 'Februari';
    }
    else if ( bln == '03') {
      var b = 'Maret';
    }
    else if ( bln == '04') {
      var b = 'April';
    }
    else if ( bln == '05') {
      var b = 'Mei';
    }
    else if ( bln == '06') {
      var b = 'Juni';
    }
    else if ( bln == '07') {
      var b = 'Juli';
    }
    else if ( bln == '08') {
      var b = 'Agustus';
    }
    else if ( bln == '09') {
      var b = 'September';
    }
    else if ( bln == '10') {
      var b = 'Oktober';
    }
    else if ( bln == '11') {
      var b = 'November';
    }
    else if ( bln == '12') {
      var b = 'Desember';
    }
    else{
      var b = '??';
    }
    
    var w = ''+arr[2]+' '+b+' '+arr[0]+'';
		
    return w;
  }
  
  function waktu(tanggal) {
    
    var full = tanggal.split(' ');
    
    var arr = full[0].split('-');
		var bln = arr[1];
    if( bln == '01'){
      var b = 'Januari';
    }
    else if ( bln == '02') {
      var b = 'Februari';
    }
    else if ( bln == '03') {
      var b = 'Maret';
    }
    else if ( bln == '04') {
      var b = 'April';
    }
    else if ( bln == '05') {
      var b = 'Mei';
    }
    else if ( bln == '06') {
      var b = 'Juni';
    }
    else if ( bln == '07') {
      var b = 'Juli';
    }
    else if ( bln == '08') {
      var b = 'Agustus';
    }
    else if ( bln == '09') {
      var b = 'September';
    }
    else if ( bln == '10') {
      var b = 'Oktober';
    }
    else if ( bln == '11') {
      var b = 'November';
    }
    else if ( bln == '12') {
      var b = 'Desember';
    }
    else{
      var b = '??';
    }
    
    if( full[0] == '0000-00-00'){
      var w = '-';
    }
    else{
      var w = ''+arr[2]+' '+b+' '+arr[0]+' '+full[1]+'';
    }
    
		
    return w;
  }
  
  function rupiah(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }