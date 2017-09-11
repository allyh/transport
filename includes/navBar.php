<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="">ITS</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="">Welcome <?php if(isset($_SESSION['loginName'])) echo $_SESSION['loginName'];?></a></li>               
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>

    </div>
</nav>