<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function hapus(url){
Swal.fire({
title:'Yakin?',
text:'Data akan dihapus!',
icon:'warning',
showCancelButton:true,
confirmButtonText:'Ya',
cancelButtonText:'Batal'
}).then((result)=>{
if(result.isConfirmed){
window.location=url;
}
});
}
</script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function(){
$('#tabelPegawai').DataTable();
});
</script>
</body>
</html>