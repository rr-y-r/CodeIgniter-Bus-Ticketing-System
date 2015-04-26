<html>
    <head>
        <title>simpleinputtest</title>
    </head>
    <body>
        <?php 
            echo form_open("$formAdd");
            echo form_label("Nomor : ");
            echo form_input("$nomor");
            echo br();
            echo form_label("Fasilitas : ");
            echo form_input("$fasilitas");
            echo br();
            echo form_label("Kapasitas : ");
            echo form_input("$fasilitas");
            echo br();
            echo form_submit("btnSave","$action");
            echo form_close();
        ?>
    </body>
</html>