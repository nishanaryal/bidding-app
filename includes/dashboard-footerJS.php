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
</script>




