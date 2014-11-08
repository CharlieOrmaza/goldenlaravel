
<meta charset="UTF-8">
<link rel="stylesheet" href="/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="/css/menu.css">


<!-- jQuery -->
<script type="text/javascript" charset="utf8" src="/dataTables/js/jquery.js"></script>
<script type="text/javascript" charset="utf8" src="/js/jquery.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="/dataTables/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="/dataTables/TableTools/css/dataTables.tableTools.css">
  
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="/dataTables/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="/dataTables/TableTools/js/dataTables.tableTools.js"></script>


<script type="text/javascript">
    $(document).ready( function () {
        $('#table_id').DataTable({
			"dom": 'T<"clear">lfrtip',
			"tableTools": {
				"sSwfPath": "/dataTables/TableTools/swf/copy_csv_xls_pdf.swf"
			}
		} );
	
    });
</script>	

<style>
	body {
		width: 100%;
		margin: 0px auto;
		background: rgba(255,255,255,0.05);
	}
	.main {
		width: 80%;
		margin: 20px auto;
		background: rgba(255,255,255,0.0);
	}
	.main h1{
		color: white;
	}
	.badge {
		float: right;
	}
	html{
		background-image: url('/img/fondos/background4.jpg');
	}
</style>
	
	
