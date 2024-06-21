<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Menu Index</title>
    <style>
        *{
            font-family:Georgia, 'Times New Roman', Times, serif; 
        }
        
        body {
            background: rgb(38, 37, 47);
        }

        .list-group {
            margin: 50px auto;
            box-shadow: 0px 5px 10px black;
            border-radius: 10px;
            overflow: hidden;
        }

        h1 {
            background-color: rgb(127, 100, 237);
            color: white;
            font-weight: bold;
            padding: 20px 0;
            margin: 0;
        }

        .list-group-item {
            border: none;
            background-color: whitesmoke;
            color: rgb(127, 100, 237);
            padding: 20px;
            font-size: 18px;
            font-weight: bold;
        }

        .list-group-item:hover {
            background-color: rgb(127, 100, 237);
            color: whitesmoke;
            font-weight: bold;
            transition: background-color 0.2s, color 0.2s;
        }

        .list-group-item-action.active {
            background-color: rgb(127, 100, 237);
            color: whitesmoke;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="list-group w-50">
        <h1 class="text-center">Menu Index</h1>
        <a href="member.php" class="list-group-item list-group-item-action">Member</a>
        <a href="buku.php" class="list-group-item list-group-item-action">Buku</a>
        <a href="peminjaman.php" class="list-group-item list-group-item-action">Peminjaman</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>