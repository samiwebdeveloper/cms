<?php
error_reporting(0);
$this->load->view('inc/header');
?>

<script type="text/javascript">
$(document).ready(function(){ 
var table =$('#myTable').DataTable( {
"lengthMenu": [[ -1, 10, 25, 50], [ "All", 10, 25, 50]],     
fixedHeader: true,
"searching": true,
"paging":   true,
"ordering": true,
"bInfo": true,
dom: 'Blfrtip',
buttons: [
{
extend: 'pdfHtml5',
orientation: 'Portrait',
pageSize: 'A4',
footer: 'true',
title:"Expense Report",
text:"<i class='fs-14 pg-download'></i> PDF",
titleAttr: 'PDF',
message:"Delivery Express\n  Powered By SaimTech \n Date:<?php echo ''.$start_date." - ".$end_date; ?> \n Expense Report \n "
},
{
extend: 'excelHtml5',
text:"<i class='fs-14 pg-form'></i> Excel",
titleAttr: 'Excel',
sheetName:'Expense Report <?php echo ''.$start_date." - ".$end_date; ?>',
exportOptions: {
modifier: { page: 'current'}
}
},
{
extend: 'copyHtml5',
footer: 'true',
text:"<i class='fs-14 pg-note'></i> Copy",
titleAttr: 'Copy'
},
{
extend: 'print',
text:"<i class='fs-14 pg-ui'></i> Print",
titleAttr: 'Print',
footer: 'true',
title:"Expense Report",
message:"Delivery Express <br> System Developer M.Saim <br>Date:<?php echo ''.$start_date." - ".$end_date; ?> <br>  <br>Expense Report<br>"
}
]       
});




 });
</script>
 <!-- START PAGE CONTENT WRAPPER -->
      <div class="page-content-wrapper">
        <!-- START PAGE CONTENT -->
        <div class="content">
          <!-- START JUMBOTRON -->
          <div class="jumbotron" data-pages="parallax">
            <div class=" container-fluid container-fixed-lg sm-p-l-0 sm-p-r-0">
              <div class="inner">
                <!-- START BREADCRUMB -->
                 <ol class="breadcrumb">
                  <li class="breadcrumb-item">Dashborad</li>
                  <li class="breadcrumb-item">Expense Report</li>
                  <li class="breadcrumb-item"><mark><?php echo ''.$start_date." - ".$end_date; ?></mark></li>
                </ol>
                <!-- END BREADCRUMB --> 
              </div>
            </div>
          </div>
          <!-- END JUMBOTRON -->
          <!-- START CONTAINER FLUID -->
          <div class="container-fluid container-fixed-lg">
            <!-- BEGIN PlACE PAGE CONTENT HERE -->
<div class="pgn-wrapper" data-position="top" style="top: 48px;" id="msg_div"></div>
<div class="row">
   
           

                  <div class="col-xl-12 col-lg-12" >

                <!-- START card -->
               
                    
               <div class=" container-fluid   container-fixed-lg bg-gray"  >
<div class="row">

<div class="col-md-12">
  <div class="card m-t-10">
  
<div class="col-md-4">
    <div class="card-header  separator">
    <div class="card-title">
      
    <h1>Expense Amount Data</h1>
   
    </div>

    </div>


<div class="card-body">

<div class="card card-default">
<div class="card-body bg-info">

<form role="form" method="post" action="<?php echo base_url(); ?>Archive/expense_report_submit">
<div class="form-group">
<label class="text-white">Start Date</label>
<input type="date" class="form-control" id="start_date" value="<?php echo $start_date; ?>" name="start_date" required="">
</div>
<div class="form-group">
<label class="text-white">End Date</label>
<input type="date" class="form-control" id="end_date" value="<?php echo $end_date; ?>" name="end_date" required="">
</div>
<div class="form-group">
<input type="submit"  value="GO" class='btn btn-danger' >
</div>

</form>
</div>
</div>
</div>

</div>



<div class="card-body">     
<div class="table-responsive m-t-10">
 <table class="table table-bordered" id="myTable">
  <thead>
    <th>Sr</th>
    <th>Expense Origin</th>
    <th>Expense Date</th>
    <th>Expense Name</th>
    <th>Expense Narration</th>
    <th>Expense Amount</th>
    <th>Created By</th>
    </thead>
  <tbody>
  <?php 
  $i=0;
  if(!empty($expense_data)){
  foreach($expense_data as $rows){ 
  $i=$i+1;  
  echo("<tr>");
  echo("<td>".$i."</td>");
  echo("<td>".$rows->city_name."</td>");
  echo("<td>".date('d/m/Y',strtotime($rows->expense_date))."</td>");
  echo("<td>".$rows->expense_name."</td>");
  echo("<td>".$rows->expense_narration."</td>");
  echo("<td>".$rows->expense_amount."</td>");
  echo("<td>".$rows->oper_user_name."</td>");
  echo("</tr>");  

  }} ?>
  </tbody> 
 </table> 
</div>


</div>


</div>

</div>
         <!-- END card -->
              </div>

            </div>
            <!-- END PLACE PAGE CONTENT HERE -->
          </div>
          <!-- END CONTAINER FLUID -->
        </div>
        <!-- END PAGE CONTENT -->




</div>

</div>

<?php
$this->load->view('inc/footer');
?>      