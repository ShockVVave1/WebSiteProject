<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 01.11.2018
 * Time: 22:10
 */
include ROOT.'/src/views/layouts/header.php';
?>

    <div>
        <?php  echo $breadcrumbs; ?>
    </div>
    <h2><?php echo $postItem['title']; ?></h2>
    <i><?php echo $postItem['date']; ?></i>
    <p><?php echo $postItem['short_content']; ?></p>
    <style>
        #telephone_button{
            display:block;
            line-height: 2em;
            padding: 0 1em;
            color:lightseagreen;
        }
    </style>

    <button id="telephone_button" data-id="<?php echo $postItem['author_id']; ?>">Show the phone number</button>
    <script>
        var elem = document. querySelector('#telephone_button');
        elem.addEventListener('click',function () {
            var id = this.dataset.id;
            ajaxSend(id,this);
        });

        function ajaxSend(id,elem) {
            console.log('id=', id);
            const req =new XMLHttpRequest();
            req.addEventListener('load', function () {
                var unswer = JSON.parse(this.responseText);
                elem.outerHTML = '<a id="telephone_button"  href="tel:'+unswer.tel+'">'+unswer.tel+'</a>';
            });
            var param = 'id='+id;
            req.open('POST','http://localhost/WebsiteProject/ajax/contact',true );
            req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            console.log(param);
            req.send(param);

        }
    </script>
    <div>
        <p style="width:-moz-max-content; margin: 0 auto;"><a href="/WebsiteProject/<?php echo $postItem['type'];?>/<?php echo $postItem['transaction_type'];?>/<?php echo $postItem['category'];?>/<?php echo $postItem['id']?>">Read more</a></p>
    </div>
    <hr>
<?php include ROOT.'/src/views/layouts/footer.php'; ?>