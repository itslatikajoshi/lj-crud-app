<?php include "./header.php";?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-8">
                <img src="https://miro.medium.com/v2/resize:fit:720/format:webp/1*2eBdh0vLZjUyCDF6x1EqvQ.png" alt="CRUD image">
            </div>
            <div class="col-sm-4">

                <form action="login.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>

    <?php include "./footer.php";?>