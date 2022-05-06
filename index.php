<html>
    <head>
        <link id="pagestyle" href="assets/style/style.css" rel="stylesheet" />
    </head>
    <?php 
        include_once('read_counter.php');
        foreach( $json as $url=>$count )
        {
            if($url==$cur_link)
            {
                $page_count = $count;
                break;
            }
        }
    ?>
    <body>
        <div class="nav-bar">
            <a href='index.php'>index</a>
            <a href='test1.php'>test1</a>
            <a href='test2.php'>test2</a>
        </div>
        <div class="container">
            <div class='counter'>
                <div class="heart-img"></div>
                <div class="counternum"><?php echo !empty($page_count) ? $page_count : ''; ?></div>
            </div>
        </div>
    </body>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.cookie.js"></script>
    <script src="assets/js/counter.js"></script>
    </html>