(function(namespace, $) {
  "use strict";

  var VpsMonthlyDatatable = function() {
    // Create reference to this instance
    var o = this;
    // Initialize app when document is ready
    $(document).ready(function() {
      o.initialize();
    });
  };

  var p = VpsMonthlyDatatable.prototype;

  // =========================================================================
  // INIT
  // =========================================================================

  p.initialize = function() {
    //DataTable and Graph
    this._initDataTables();
    //Knob Charts
    this._initKnobCharts();
  };
  
  // =========================================================================
  // CHARTS
  // =========================================================================

  p._initKnobCharts = function () {
    var q = this;
    $.ajax({
      url: $('#knob-container').data('source'),
      type: 'POST',
      success: function(response) {
        q._knob(response);
        $(window).trigger('resize').trigger('scroll');
        setInterval(function(){ q._refreshKnob(); }, 2000, q);
      },
      error: function (error) {
        var dials = new Array(); 
        dials[0] = $('#cpu-knob'), dials[1] = $('#ram-knob');

        $.each(dials, function(k, $dial) {
          $dial.closest('.knob').removeClass('loading-spinner');
          $dial.closest('.knob').html('<div class="alert alert-danger width-5" style="padding: 1em;">Something went wrong!</div>');
        });
      }
    })
  };

  p._knob = function(response) {
    var dials = new Array(), q =this, options; 
        dials[0] = $('#cpu-knob'), dials[1] = $('#ram-knob');
    $.each(dials, function(k, $dial) {
      options = materialadmin.App.getKnobStyle($dial);
      if(k == 0){
        $dial.val(response.cpu_used).trigger('change');
      } else {
        $dial.val(response.ram_used).trigger('change');
      }
      $dial.knob(options);
      $dial.closest('.knob').removeClass('loading-spinner');
      $dial.removeClass('hidden');
    });
  };

  p._refreshKnob = function(response) {
    $.ajax({
      url: $('#knob-container').data('source'),
      type: 'POST',
      success: function(response) {
        var dials = new Array(); 
        dials[0] = $('#cpu-knob'), dials[1] = $('#ram-knob');
        $.each(dials, function(k, $dial) {
          if(k == 0){
            $dial.val(response.cpu_used).trigger('change');
          } else {
            $dial.val(response.ram_used).trigger('change');
          }
        });
        $(window).trigger('resize').trigger('scroll');
      }
    })
  }

  // =========================================================================
  // DATATABLES
  // =========================================================================

  p._initDataTables = function() {
    if (!$.isFunction($.fn.dataTable)) {
      return;
    }

    this._monthly();
    this._daily();

    var q = this;
    $('#usage-date').on('change', function(){
      $('.display-usage-date').text($('#usage-date option:selected').text());
      q._monthly(true);
      q._daily(true);
    });
  };

  p._monthly = function(refresh) {
    var q = this;
    $.ajax({
      url: $('#vps-monthly-datatable').data('source'),
      type: 'POST',
      data: {t_date:$('#usage-date').val()},
      success: function(response) {
        $('#total-upload-usage').text(response.selected_traffic.t_out + ' GB');
        $('#total-download-usage').text(response.selected_traffic.t_in + ' GB');
        if(refresh) {
          q._refreshMonthlyDatatable(response.traffic);
          q._makeGraph(response.traffic, 'monthly');
        } else {
          q._createMonthlyDatatable(response.traffic);
          q._makeGraph(response.traffic, 'monthly');
        }
        $(window).trigger('resize').trigger('scroll');
      }
    });
  };

  p._daily = function(refresh) {
    var q = this;
    $.ajax({
      url: $('#vps-daily-datatable').data('source'),
      type: 'POST',
      data: {t_date:$('#usage-date').val()},
      success: function(response) {
        if(refresh) {
          q._refreshDailyDatatable(response);
          q._makeGraph(response, 'daily');
        } else {
          q._createDailyDatatable(response);
          q._makeGraph(response, 'daily');
        }
        $(window).trigger('resize').trigger('scroll');
      }
    })
  };

  p._makeGraph = function(response, graphName) {
    var graph = $('#'+graphName+'-graph');
    if (!$.isFunction($.fn.plot) || graph.length === 0) {
      return;
    }

    var q = this, labelColor = graph.css('color');
    var data = [
      {
        label: 'Download',
        data: q._getData(graphName, response, 't_in'),
        last: true
      },
      {
        label: 'Upload',
        data: q._getData(graphName, response, 't_out'),
        last: true
      }
    ];

    var options = {
      colors: graph.data('color').split(','),
      series: {
        shadowSize: 0,
        lines: {
          show: true,
          lineWidth: 2
        },
        points: {
          show: true,
          radius: 3,
          lineWidth: 2
        }
      },
      legend: {
        show: true,
        position: 'nw'
      },
      xaxis: {
        mode: null,
        tickFormatter: function(i,obj){
          if(i == Math.floor(i) && graphName == 'monthly'){
            return m[i]
          } else if(i == Math.floor(i) && graphName == 'daily'){
            return i;
          } else {
            return '';
          }
        },
        color: 'rgba(0, 0, 0, 0)',
        font: {color: labelColor}
      },
      yaxis: {
        font: {color: labelColor}
      },
      grid: {
        borderWidth: 0,
        color: labelColor,
        hoverable: true
      }
    };

    graph.width('100%');
    var plot = $.plot(graph, data, options);

    var tip, previousPoint = null;
    graph.bind("plothover", function (event, pos, item) {
      if (item) {
        if (previousPoint !== item.dataIndex) {
          previousPoint = item.dataIndex;

          var x = item.datapoint[0];
          var y = item.datapoint[1];
          var tipLabel = '<strong>' + $(this).data('title') + '</strong>';
          var tipContent = y + " GB " + item.series.label.toLowerCase() + " on " + m[x];

          if (tip !== undefined) {
            $(tip).popover('destroy');
          }
          tip = $('<div></div>').appendTo('body').css({left: item.pageX, top: item.pageY - 5, position: 'absolute'});
          tip.popover({html: true, title: tipLabel, content: tipContent, placement: 'top'}).popover('show');
        }
      }
      else {
        if (tip !== undefined) {
          $(tip).popover('destroy');
        }
        previousPoint = null;
      }
    });
  };

  p._createMonthlyDatatable = function(response) {
    var table = $('#vps-monthly-datatable').DataTable({
      "dom": 'T<"clear">lfrtip',
      "processing": true,
      "paging": false,
      "data": response,
      "columns": [
        {"data": "mno", "render": function(data,row,full) {
          return m[data];
        }},
        {"data": "t_in", "searchable": false},
        {"data": "t_out", "searchable": false},
        {"data": "t_total", "searchable": false}
      ],
      "tableTools": {
        "sSwfPath": $('#vps-monthly-datatable').data('swftools')
      },
      "order": [],
      "language": {
        "lengthMenu": '_MENU_ entries per page',
        "search": '<i class="fa fa-search"></i>',
        "paginate": {
          "previous": '<i class="fa fa-angle-left"></i>',
          "next": '<i class="fa fa-angle-right"></i>'
        }
      },
      "drawCallback": function( settings ) {
        $(window).trigger('resize').trigger('scroll');
        $('[data-toggle="tooltip"]').tooltip();
      }
    });
  };

  p._createDailyDatatable = function(response) {
    var table = $('#vps-daily-datatable').DataTable({
      "dom": 'T<"clear">lfrtip',
      "processing": true,
      "data": response,
      "columns": [
        {"data": "dno"},
        {"data": "t_in", "searchable": false},
        {"data": "t_out", "searchable": false},
        {"data": "t_total", "searchable": false}
      ],
      "tableTools": {
        "sSwfPath": $('#vps-daily-datatable').data('swftools')
      },
      "order": [],
      "language": {
        "lengthMenu": '_MENU_ entries per page',
        "search": '<i class="fa fa-search"></i>',
        "paginate": {
          "previous": '<i class="fa fa-angle-left"></i>',
          "next": '<i class="fa fa-angle-right"></i>'
        }
      },
      "drawCallback": function( settings ) {
        $(window).trigger('resize').trigger('scroll');
        $('[data-toggle="tooltip"]').tooltip();
      }
    });
  };

  p._refreshMonthlyDatatable = function(response) {
    var table = $('#vps-monthly-datatable').DataTable();

    table.clear();
    table.rows.add(response);
    table.draw();
  };

  p._refreshDailyDatatable = function(response) {
    var table = $('#vps-daily-datatable').DataTable();

    table.clear();
    table.rows.add(response);
    table.draw();
  };

  p._getData = function(graphName, response, query) {
    var data = [];
    $.each(response, function(k,v){
      if(graphName == 'monthly'){
        data.push([v['mno'], v[query]]);
      } else {
        data.push([v['dno'], v[query]]);
      }
    })
    return data;
  };
  // =========================================================================
  namespace.VpsMonthlyDatatable = new VpsMonthlyDatatable;
}(this.materialadmin, jQuery)); // pass in (namespace, jQuery):
