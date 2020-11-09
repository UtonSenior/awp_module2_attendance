        
        </div>
        <div class="text-white bg-primary footer-clean fixed-bottom">
        <footer>
            <div class="container">
                <div class="row justify-content-center py-3">
                    <?php                     
                        echo "Copyright &copy; IT Conference Attendance " . date("Y") . "";                
                    ?>
                </div>
            </div>
        </footer>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <!-- MDBootstrap Datatables  -->
        <script type="text/javascript" src="script/datatables.min.js"></script>

        <script>
            $( function() {
                $( "#dob" ).datepicker({
                    changeMonth: true,
                    changeYear: true,
                    yearRange: "-100: +0",
                    dateFormat: "yy-mm-dd"
                });                
            } );

            $(document).ready( function () {
                $('#attendees-list').DataTable();
            } );
        </script>
    </body>
</html>