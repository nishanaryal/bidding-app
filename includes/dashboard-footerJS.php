<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/rangeslider.js"></script>
<script src="../assets/js/select2.min.js"></script>
<script src="../assets/js/owl.carousel.min.js"></script>
<script src="../assets/js/jquery.magnific-popup.min.js"></script>
<script src="../assets/js/slick.js"></script>
<script src="../assets/js/slider-bg.js"></script>
<script src="../assets/js/lightbox.js"></script> 
<script src="../assets/js/imagesloaded.js"></script>
<script src="../assets/js/jquery.counterup.min.js"></script>
<script src="../assets/js/counterup.min.js"></script>
<script src="../assets/js/custom.js"></script>


<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
    $('#DataTable').DataTable();
} );
</script>


<script type="text/javascript">
	$(document).ready(function() {
    $('#BiddersTable').DataTable();
} );
</script>


<script>
			$(document).ready(function() {
    var groupColumn = 0;
    var table = $('#BiddingTable').DataTable({
        "columnDefs": [
            { "visible": false, "targets": groupColumn }
        ],
        "order": [[ groupColumn, 'asc' ]],
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
    } );
 
    // Order by the grouping
    $('#BiddingTable tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === groupColumn && currentOrder[1] === 'asc' ) {
            table.order( [ groupColumn, 'desc' ] ).draw();
        }
        else {
            table.order( [ groupColumn, 'asc' ] ).draw();
        }
    } );
} );
		</script>



<script type="text/javascript">
// Delete Product
function deleteProduct(pid, name)
{
  if(confirm('Are you sure you want to delete this Product: '+name+ '?'))
  {
    window.location='admin-func.php?delete-pid='+pid
  }
}
// Delete Product

// Delete User
function deleteUser(uid, userFullName)
{
  if(confirm('Are you sure you want to delete this User: '+userFullName+'?'))
  {
    window.location='admin-func.php?delete-userid='+uid
  }
}
// Delete User

// Delete makeBidderWin
function makeBidderWin(winnerBidID, bidderName)
{
  if(confirm('Are you sure you want to make '+bidderName+' win the Bidding?'))
  {
    window.location='admin-func.php?winnerBidID='+winnerBidID
  }
}
// Delete makeBidderWin



</script>




