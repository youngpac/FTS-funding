<div class="container"><ol class="breadcrumb">  <li><a target="_blank" href="<?php echo HTTP_PATH ?>">Home</a></li>  <li><a href="<?php echo HTTP_PATH ?>/admin">Admin</a></li>  <li class="active"><?php echo $country_name ?></li></ol><!-- Header --><div id="top-nav" class="navbar navbar-inverse navbar-static-top">  <div class="navbar-header">  	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">    	<span class="icon-toggle"></span>  	</button>  	<a class="navbar-brand" href="#">Dashboard</a>  </div></div><!-- /Header -->  <h4>This is Data for <?php echo $country_name; ?></h4>    <table class="table">    <tr><th>Year</th><th>Request</th><th>Funding</th><th>% Cumulative Funded</th><th></th><th></th></tr>    <?php foreach ($country as $countries){  echo '<tr><td>'.$countries["year"].'</td><td>'.number_format($countries["request"],2).'</td><td>'.number_format($countries["funding"],2).'</td><td>'.number_format(($countries["funding"]/$countries["request"]*100),3).'</td> <td><a class="edit" href="#" data-year="'.$countries["year"].'" data-request="'.$countries["request"].'" data-funding="'.$countries["funding"].'">Edit</a></td>  <td><a class="delete" href="#" data-year="'.$countries["year"].'" data-request="'.$countries["request"].'" data-funding="'.$countries["funding"].'">Delete</a></td></tr>';    } ?>    </table>    <a class="add_data btn btn-primary" href="#">Add Country Data for <?php echo $country_name; ?> </a></div> <div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">    <div class="modal-dialog">        <form action="<?php echo HTTP_PATH ?>/admin/postEdit" method="post" id="frm-edit">      <div class="modal-content">        <div class="modal-header">          <!--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->          <h4 class="modal-title">Editing Data of <?php echo $country_name; ?> for Year <span class="this-year"></span></h4>        </div>        <div class="modal-body">                <div class="updating">                                          <input id="country_iso" type="hidden"   name="country_iso"  value="<?php echo $country_iso; ?>"/>                                                                                <div class="row">	                                        <div class="form-group">                                                    <label for="requested" class="col-md-4 control-label">Requested Amount in USD $</label>                                                    <div class="col-md-5">                                                    <input id="edit_requested" class="form-control" type="text"   name="edit_requested" required="required" />                                                </div>                                        </div>                                    </div></br>                                     <div class="row">	                                        <div class="form-group">                                                    <label for="edit_funded" class="col-md-4 control-label">Funded Amount in USD $</label>                                                   <div class="col-md-5">                                                    <input id="edit_funded" class="form-control" type="text"   name="edit_funded" required="required" />                                                </div>                                        </div>                                    </div>                </div>        </div>        <div class="modal-footer">          <button type="button" class="btn btn-default cancel" data-dismiss="modal">Cancel</button>          <button id="save-edit" type="submit" class="btn btn-primary save-edit">Save changes</button>             <button type="button" class="btn btn-success closing" style="display:none;">Close</button>        </div>      </div><!-- /.modal-content -->      </form>    </div><!-- /.modal-dialog -->  </div><!-- /.modal -->    <!---adding data modal--->   <div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">    <div class="modal-dialog">    <form action="<?php echo HTTP_PATH ?>/admin/addRecord" method="post" id="frm-add-year">      <div class="modal-content">        <div class="modal-header">          <!---<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--->          <h4 class="modal-title">Adding Data of <?php echo $country_name; ?><span class="this-year"></span></h4>        </div>        <div class="modal-body">                         <div class="adding">                          <input id="add_country_iso" type="hidden"   name="add_country_iso"  value="<?php echo $country_iso; ?>"/>                                      <div class="row">	                                        <div class="form-group">                                                    <label for="requested" class="col-md-4 control-label">Year</label>                                                 <div class="col-md-5">                                                    <input id="add_year" class="form-control" type="text"   name="add_year" required="required" />                                                 </div>                                        </div>                                    </div>                                      <div class="row">	                                        <div class="form-group">                                                    <label for="requested" class="col-md-4 control-label">Requesting Amount in USD $</label>                                                  <div class="col-md-5">                                                    <input id="add_requested" class="form-control" type="text"   name="add_requested" required="required" />                                                 </div>                                       </div>                                    </div>                                     <div class="row">	                                        <div class="form-group">                                                    <label for="funded" class="col-md-4 control-label">Funded Amount in USD $</label>                                                  <div class="col-md-5">                                                    <input id="add_funded" class="form-control" type="text"   name="add_funded" required="required" />                                                </div>                                        </div>                                    </div>                         </div>        </div>        <div class="modal-footer">          <button type="button" class="btn btn-default cancel" data-dismiss="modal">Cancel</button>          <button type="submit" class="btn btn-primary add-record">Add Record</button>           <button type="button" class="btn btn-success closing" style="display:none;">Close</button>        </div>      </div><!-- /.modal-content -->      </form>    </div><!-- /.modal-dialog -->  </div><!-- /.modal -->    <!----deleting the data modal --->   <div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">    <div class="modal-dialog">      <div class="modal-content">        <div class="modal-header">     <!--     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>-->          <h4 class="modal-title">Deleting Data of <?php echo $country_name; ?> for Year <span class="this-year"></span></h4>        </div>        <div class="modal-body">            <div class="deleting">                Are you sure you want to delete data of <?php echo $country_name; ?> for <span class="this-year"></span>            </div>        </div>        <div class="modal-footer">         <button type="button" class="btn btn-default cancel" data-dismiss="modal">Cancel</button>          <button type="button" class="btn btn-danger delete-record">Delete Record</button>          <button type="button" class="btn btn-success closing" style="display:none;">Close</button>        </div>      </div><!-- /.modal-content -->    </div><!-- /.modal-dialog -->  </div><!-- /.modal --><script>$(function(){//upon clicking on edit  $('.edit').click(function(){  var year =$(this).data("year");  var request =$(this).data("request");  var funding =$(this).data("funding");    $('#edit_requested').val(request);    $('#edit_funded').val(funding);    $('.this-year').html(year);  $('#editData').modal();  });   //upon clicking on delete   $(".delete").click(function(){          var year =$(this).data("year");             $('.this-year').html(year);        $("#deleteConfirm").modal();   });      //upon clicking on add data      $(".add_data").click(function(){          var year =$(this).data("year");             $('.this-year').html(year);        $("#addData").modal();          $("#input-year").datepicker({ dateFormat: "yyyy-mm-dd" });   });      //for picking only years   $("#input-year").datepicker( {});//save changes on edit    $('.save-edit').click(function(){	       $('#frm-edit').bootstrapValidator({        message: 'This value is not valid',        feedbackIcons: {            valid: 'glyphicon glyphicon-ok',            invalid: 'glyphicon glyphicon-remove',            validating: 'glyphicon glyphicon-refresh'        },        fields: {           edit_requested: {                   validators: {                    notEmpty: {                        message: 'How much in USD?'                    },          					regexp: {                        regexp: /^0*[1-9][0-9]*(\.[0-9]+)?|0+\.[0-9]*[1-9][0-9]*$/,                        message: 'Please insert a real amount'                    },                }            },           edit_funded: {                validators: {                    notEmpty: {                        message: 'How much in USD?'                    },          					regexp: {                        regexp: /^0*[1-9][0-9]*(\.[0-9]+)?|0+\.[0-9]*[1-9][0-9]*$/,                        message: 'Please insert a real amount'                    },                }            }        }    })          .on('status.field.bv', function(e, data) {            // $(e.target)  --> The field element            // data.bv      --> The BootstrapValidator instance            // data.field   --> The field name            // data.element --> The field element            data.bv.disableSubmitButtons(false);        })          .on('success.form.bv', function(e) {            // Prevent form submission            e.preventDefault();            // Get the form instance            var $form = $(e.target);            // Get the BootstrapValidator instance            var bv = $form.data('bootstrapValidator');                                           var year = $(".this-year").html();                        var iso_code =$("#country_iso").val();                        var request =$("#edit_requested").val();                        var funding =$("#edit_funded").val();                         var country_name = $('.active').html();            // Use Ajax to submit form data            $.post($form.attr('action'), { year:year,iso_code:iso_code,request:request,funding:funding }, function(result) {                document.getElementById("frm-edit").reset();                 $(".updating").html("Data of " + country_name + " for year " + year + " has been updated.");                  //$(".updating").html(result);                  $(".save-edit").hide();                  $(".cancel").hide();                  $(".closing").show();            });        });  });  //close button    $(".closing").click(function() {    window.setTimeout(function(){location.reload()},1);	});//delete a record of a particular year    $('.delete-record').click(function(){          var year = $(".this-year").html();          var iso_code =$("#country_iso").val();          var country_name = $('.active').html();              $.post('<?php echo HTTP_PATH ?>/admin/deleteRecord',{ year:year,iso_code:iso_code },function(edit_data){                  $(".deleting").html("Data of " + country_name + " for year " + year + " has been deleted.");                  $(".delete-record").hide();                    $(".cancel").hide();                  $(".closing").show();                });                    });     //adding a record of a particular year  $('.add-record').click(function(){	       $('#frm-add-year').bootstrapValidator({        message: 'This value is not valid',        feedbackIcons: {            valid: 'glyphicon glyphicon-ok',            invalid: 'glyphicon glyphicon-remove',            validating: 'glyphicon glyphicon-refresh'        },        fields: {            add_year: {                validators: {                    notEmpty: {                        message: 'Please enter an Year'                    }                }            },           add_requested: {                   validators: {                    notEmpty: {                        message: 'How much in USD?'                    },          					regexp: {                        regexp: /^0*[1-9][0-9]*(\.[0-9]+)?|0+\.[0-9]*[1-9][0-9]*$/,                        message: 'Please insert a real amount'                    },                }            },           add_funded: {                validators: {                    notEmpty: {                        message: 'How much in USD?'                    },          					regexp: {                        regexp: /^0*[1-9][0-9]*(\.[0-9]+)?|0+\.[0-9]*[1-9][0-9]*$/,                        message: 'Please insert a real amount'                    },                }            }        }    })          .on('status.field.bv', function(e, data) {            // $(e.target)  --> The field element            // data.bv      --> The BootstrapValidator instance            // data.field   --> The field name            // data.element --> The field element            data.bv.disableSubmitButtons(false);        })          .on('success.form.bv', function(e) {            // Prevent form submission            e.preventDefault();            // Get the form instance            var $form = $(e.target);            // Get the BootstrapValidator instance            var bv = $form.data('bootstrapValidator');            // Use Ajax to submit form data            $.post($form.attr('action'), $form.serialize(), function(result) {                  document.getElementById("frm-add-year").reset();                  $(".adding").html(result);                  $(".add-record").hide();                  $(".cancel").hide();                  $(".closing").show();            });        });  });});</script>