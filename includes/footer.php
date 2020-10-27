            <br>
            <br>
            <br>
            <br>
            <br>
        
            <footer class="bg-light navbar-dark pt-4 ">
                <div class="container-fluid">
                    <div class="footer-copyright text-center py-3">
                        <?php                     
                            echo "<p style='color: black';>Copyright &copy; 2020-" . date("Y") . " Uton Senior</p>";                
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

        <script>
            $( function() {
                $( "#dob" ).datepicker({
                    changeMonth: true,
                    changeYear: true,
                    yearRange: "-100: +0"
                });                
            } );
        </script>
    </body>
</html>