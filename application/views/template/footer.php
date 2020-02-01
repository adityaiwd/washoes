<!-- <div class="text-center">
    <p>Tim 12 Internship BCC</p>
</div> -->

<script src="<?php echo base_url('vendors/jquery/dist/jquery.min.js'); ?>"></script>
<!-- <script src="<?php echo base_url('vendors/popper.js/dist/umd/popper.min.js'); ?>"></script> -->
<script src="<?php echo base_url('vendors/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('vendors/chosen/chosen.jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/sweetalert2.all.min.js'); ?>"></script>

<script type="text/javascript">
    $(".standardSelect").chosen({
        disable_search_threshold: 10,
        no_results_text: "Maaf, data tidak ditemukan!",
        width: "100%"
    });
</script>

<script src="<?php echo base_url('assets/js/main.js'); ?>"></script>

<script type="text/javascript">
    $(window).on("load", () => {
        $(document).ready(() => {
            App.init()
        })
    })
</script>

</body>

</html> 
