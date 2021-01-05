<!DOCTYPE html>
<head>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    <style>
        #page_container{
            margin-top: 100px;
        }

        #success_results iframe{
            width: 100%;
            height: 50vh;
        }
    </style>
</head>
<body>
    <?php
    require_once ('./global.php');
    $clinic_id = readConfig($config_file_name);
    ?>
    <div class="container" id="page_container">

        <div>
            <button type="submit" class="btn btn-primary" id="start_btn"><span class="btn-text">Start</span><span class="ml-1 badge badge-light" id="clinic_id"><?php echo $clinic_id?></span></button>

        </div>

        <div class="success-results">
            <h4 class="mt-3">Success Page List</h4>
            <div class="mt-3" id="success_results">
                <iframe src=""></iframe>
            </div>
        </div>
    </div>
    <script>
        jQuery('#success_results iframe').attr('src', 'success.txt?v=' + Date.now());
        var bStart = false;
        var calling = false;
        function checkSite(){
            calling = true;
            jQuery.ajax({
                url: '/checksite.php',
                type: 'post',
                data: {
                    
                },
                success: function(clinic_id){                    
                    jQuery('#clinic_id').html(clinic_id);
                    jQuery('#success_results iframe').attr('src', 'success.txt?v=' + Date.now());

                    calling = false;
                }
            })
        }

        setInterval(function(){
            if(bStart && !calling){
                checkSite();
            }
        }, 300);

        jQuery(document).on('click', '#start_btn', function(){
            bStart = !bStart;
            if(bStart){
                $(this).find('.btn-text').text('Pause');
                $(this).addClass('btn-danger');
                $(this).removeClass('btn-primary');
            }
            else{
                $(this).find('.btn-text').text('Start');
                $(this).addClass('btn-primary');
                $(this).removeClass('btn-danger');
            }
        })
    </script>
</body>