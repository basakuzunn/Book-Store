<?php
require_once("./php/components.php");
require_once("./php/operation.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b0b453a095.js" crossorigin="anonymous"></script>


    <link rel='stylesheet' href="style.css">
</head>

<body>
    <main>
        <div class='container text-center'>
            <h1 style="background-color:#7f8487" class=' pt-4 text-light rounded'> <i class="fas fa-book-open"></i>Book Store</h1>
            <div class='d-flex justify-content-center'>
                <form action="" method="POST" class="w-50">
                    <div class="pt-2">
                        <?php InputElement(icon: "<i class='fas fa-user'></i>", placeholder: "ID", name: "book_id", value:setID()) ?>
                    </div>
                    <div class="pt-2">
                        <?php InputElement(icon: "<i class='fa fa-solid fa-book'></i>", placeholder: "Book Name", name: "book_name", value: ""); ?>
                    </div>
                    <div class="row pt-2">
                        <div class="col">
                            <?php InputElement(icon: "<i class='fa fa-solid fa-laptop'></i>", placeholder: "Publisher", name: "book_publisher", value: ""); ?>
                        </div>
                        <div class="col">
                            <?php InputElement(icon: "<i class='fa fa-solid fa-tags'></i>", placeholder: "Price", name: "book_price", value: ""); ?>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <?php buttonElement(btnId: "btn-create", styleClass: "btn btn-primary", text: "<i class='fas fa-solid fa-check'></i>", name: "create", attr: "data-toggle='tooltip' data-placement='bottom' title='Create'"); ?>
                        <?php buttonElement(btnId: "btn-read", styleClass: "btn btn-primary", text: "<i class='fas fa-sync'></i>", name: "read", attr: "data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
                        <?php buttonElement(btnId: "btn-update", styleClass: "btn btn-primary", text: "<i class='fas fa-solid fa-pencil'></i>", name: "update", attr: "data-toggle='tooltip' data-placement='bottom' title='Update'"); ?>
                        <?php buttonElement(btnId: "btn-delete", styleClass: "btn btn-primary", text: "<i class='fas fa-trash'></i>", name: "delete", attr: "data-toggle='tooltip' data-placement='bottom' title='Delete'"); ?>
                        <?php deleteBtn(); ?>
                    </div>
                </form>
            </div>
            <div class="d-flex table-data">
                <table style="background-color:	#b69996" class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Book Name</th>
                            <th>Publisher</th>
                            <th>Book Price</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody id="tbody" style="background-color: #F0EAEA">
                        <?php
                        if (isset($_POST['read'])) {
                            $result = getData();

                            if ($result) {
                                while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr>
                                        <td data-id="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></td>
                                        <td data-id="<?php echo $row['id']; ?>"><?php echo $row['book_name']; ?></td>
                                        <td data-id="<?php echo $row['id']; ?>"><?php echo $row['book_publisher']; ?></td>
                                        <td data-id="<?php echo $row['id']; ?>"><?php echo $row['book_price'] . 'TL'; ?></td>
                                        <td><i class='fas fa-edit btnEdit' data-id="<?php echo $row['id']; ?>"></i></td>
                                    </tr>
                        <?php
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <script src="./php/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>