

	<script src="<?=base_url('assets/jquery/jquery-3.2.1.min.js')?>"></script>
	<script src="<?=base_url('assets/bootstrap/js/popper.js')?>"></script>
	<script src="<?=base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>

    <script src="<?=base_url('assets/semantic/dist/semantic.min.js')?>"></script>
    <script src="<?=base_url('assets/semantic/dist/components/tab.js')?>"></script>
    
    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url('assets/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?=base_url('assets/jquery-easing/jquery.easing.min.js')?>"></script>
    <!-- Page level plugin JavaScript-->
    <script src="<?=base_url('assets/chart.js/Chart.min.js')?>"></script>
    <script src="<?=base_url('assets/datatables/jquery.dataTables.js')?>"></script>
    <script src="<?=base_url('assets/datatables/dataTables.bootstrap4.js')?>"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?=base_url('assets/js/sb-admin.min.js')?>"></script>
    <!-- Custom scripts for this page-->
    <script src="<?=base_url('assets/js/sb-admin-datatables.min.js')?>"></script>
    <script src="<?=base_url('assets/js/sb-admin-charts.min.js')?>"></script>

    <script src="<?=base_url('assets/js/home_aluno.js')?>"></script>
    <script src="<?=base_url('assets/js/image-map-highlighter.js')?>"></script>
    <script src="<?=base_url('assets/js/interface_corretor.js')?>"></script>

    <!-- LOADING PAGE ASSETS -->
<?php 
    // dentro de assets/css e assets/js podem ter arquivos especificos pra cada página. No controlador eu especifico que arquivos eu quero carregar dessas páginas
    // e nos loops abaixo eu pego esses arquivos especificados no controlador e puxo eles
    // pra ver um exemplo é só olhar em admin/login
    if(isset($assets)){
        foreach ($assets as $folder => $files){
            if($folder == 'js'){
                foreach($files as $file){
                    ?><script src="<?php echo base_url('assets/js/'.$file);   ?>" type="text/javascript"></script><?php
                }
            }
        }
    }
?>  

</body>
</html>