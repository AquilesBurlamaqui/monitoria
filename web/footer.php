     <footer class="footer">
        <script src="http://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
        <script src="<?php echo Dbcommand::getServer(); ?>/components/js/responsive.js" type="text/javascript"></script>
        <script src="<?php echo Dbcommand::getServer(); ?>/components/ckeditor/ckeditor.js" type="text/javascript"></script>
        </footer>
    </body>
</html>

<?php
    Connection::close();
    unset($user);
    unset($company);