<link href="<?=base_url('assets/css/style.css'); ?>" rel="stylesheet">
<?php
if (isset($files) && count($files))
{
    ?>
        <ul class="list-group">
            <?php
            foreach ($files as $file)
            {
                ?>
                <li>
                    <img class="img-responsive img-thumbnail img img-circle" src="<?=base_url('files');  echo '/'.$file->filename ?>" style="width:50px;height:50px;" />
                    <a href="#" class="delete_file_link glyphicon glyphicon-remove text-danger" data-file_id="<?php echo $file->id?>"><strong><?php echo $file->title?></strong> </a>
                    <br>
                    <div class="col-sm-6">
                    <span class="text-muted">File Name : <br><?php echo $file->filename?></span>
                    <input type="text" class="hidden form-control" value="<?php echo $file->filename?>" name="file" />
                    </div>
                    <br>
                    
                </li>
                <?php
            }
            ?>
        </ul>
    </form>
    <?php
}
else
{
    ?>
    <p>No Files Uploaded</p>
    <?php
}
?>
<script>
function refresh_files()
{
    $.get('./mahasiswa/files/')
    .success(function (data){
        $('#files').html(data);
    });
}
$(document).ready(function() {
    $('.delete_file_link').click(function(e) {
        e.preventDefault();
        if (confirm('Are you sure you want to delete this file?'))
        {
            var link = $(this);
            $.ajax({
                url			: './mahasiswa/delete_file/' + link.data('file_id'),
                dataType	: 'json',
                success		: function (data)
                {
                    files = $('#files');
                    if (data.status === "success")
                    {
                        link.parents('li').fadeOut('fast', function() {
                            $(this).remove();
                            if (files.find('li').length == 0)
                            {
                                files.html('<p>No Files Uploaded</p>');
                            }
                        });
                    }
                    else
                    {
                        alert(data.msg);
                    }
                    refresh_files();
                }
            });
        }
    });
});
</script>