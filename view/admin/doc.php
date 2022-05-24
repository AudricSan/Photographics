
<?php
if (!isset($_SESSION['logged'])) {
    echo "<script language='Javascript'>document.location.replace('/admin/login');</script>";
} else {
    $adminDAO = new AdminDAO;
    $adminConnected = $adminDAO->fetch($_SESSION['logged']);

    if (!$adminConnected) {
        echo "<script language='Javascript'>document.location.replace('/');</script>";
    }
}

$root = $_SESSION['root'];

echo "
    <div class='dashboard'>
        <div id='adobe-dc-view' style='height: 360px; width: 500px;'></div>
        <script src='https://documentcloud.adobe.com/view-sdk/main.js'></script>
        <script type='text/javascript'>
        document.addEventListener('adobe_dc_view_sdk.ready', function(){
            var adobeDCView = new AdobeDC.View({clientId: '121c9718618a41ff85db8e221d50dc4f', divId: 'adobe-dc-view'});
            adobeDCView.previewFile({
            content:{ location:
                { url: '$root/docs/Documentation.pdf'}},
            metaData:{fileName: 'Documentation Photographics.pdf'}
            },
            {
            embedMode: 'SIZED_CONTAINER'
            });
        });
        </script>
    </div>";

echo "</div> </main>";

echo "
";