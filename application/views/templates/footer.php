	</div>

	<footer class="py-4 bg-light mt-auto">
	    <div class="container-fluid">
	        <div class="d-flex align-items-center justify-content-center small">
	            <div>
	                <a>&copy; Copyright WPU API 2020 all rights reseverd</a>
	                &middot;
	                <a href="javascript:void(0)">Privacy Policy</a>
	                &middot;
	                <a href="javascript:void(0)">Terms &amp; Conditions</a>
	            </div>
	        </div>
	    </div>
	</footer>
	<script src="<?= base_url(); ?>assets/sbadmin/dist/assets/demo/chart-area-demo.js"></script>
	<script src="<?= base_url(); ?>assets/sbadmin/dist/assets/demo/chart-bar-demo.js"></script>
	<script src="<?= base_url(); ?>assets/sbadmin/dist/js/scripts.js"></script>
	<script>
		$('#dataTable').dataTable({
		    columnDefs: [
		        {
		            "orderable" : false,
		            "targets" : [0, 1, 2, 3, 4, 5]
		        },
		        {
		            "searchable" : false,
		            "orderable" : false,
		            "targets" : [5, 3]
		        }
		    ]
		})
	</script>
</body>
</html>