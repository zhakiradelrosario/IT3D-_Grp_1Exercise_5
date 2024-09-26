<!DOCTYPE html>
<html lang="en">
    
  <head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA.Compatible" content="IR-Edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <title>Form Handling & Live Search</title>
   
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Vast+Shadow&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300..700&family=Vast+Shadow&display=swap" rel="stylesheet">
   
   <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: "Fredoka", sans-serif;
        background-color: black;
        padding: 20px;
    }

    h1 {
        font-family: "Vast Shadow", serif;
        font-weight: 400;
        font-style: normal;
        color: black;
    }

    main {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background-color: whitesmoke;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    form {
        display: flex;
        flex-direction: column;
    }

    label {
        margin: 10px 0 5px;
        font-weight: bold;
        color: #333;
    }

    input[type="text"], select {
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-bottom: 20px;
        font-size: 16px;
    }

    input[type="text"]:focus, select:focus {
        border-color: #66afe9;
        outline: none;
    }

    button {
        padding: 10px 20px;
        background-color: black;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: white;
        color: black;
    }

    #searchresult {
        padding: 15px;
        background-color: #FCF5E5;
        border: 1px solid #ced4da;
        display: none;
        margin-bottom: 20px;
    }

   </style>

  </head>

  <body>
    <main>

        <!-- Search Section -->
        <div class="container" style="max-width: 100%; padding: 20px; background-color:  #E8E8E8;">
            <div class="text-center mt-5 mb-4">
                <h1>Grp_1_Exercise#5</h1>
            </div>
            <input type="text" class="form-control" id="search_db" autocomplete="off" placeholder="Search...">
        </div>

        <div id="searchresult"></div>

        <!-- Form Section -->
        <form action="formhandle.php" method="post">
            <h2>_____________FORM_____________</h2>
           <label for="id">ID</label>
           <input required id="id" type="text" name="id" placeholder="Enter your ID">

            <label for="firstname">Fullname?</label>
            <input required id="fullname" type="text" name="fullname" placeholder="Fullname...">

            <label for="age">Age?</label>
            <input required id="age" type="number" name="age" placeholder="Age" min="0">

            <label for="email">Email?</label>
            <input required id="email" type="email" name="email" placeholder="Email...">


            <label for="course">Course?</label>
            <input required id="course" type="text" name="course" placeholder="Your course">

            <label for="school">School Attended?</label>
            <select id="school" name="school">
                <option value="none">None</option>
                <option value="Pamantasan ng Lungsod ng Muntinlupa">Pamantasan ng Lungsod ng Muntinlupa</option>
                <option value="University of the Philippines Los Baños">University of the Philippines Los Baños</option>
                <option value="Olivarez College">Olivarez College</option>
                <option value="National University">National University</option>
                <option value="Polytechnic University of the Philippines">Polytechnic University of the Philippines</option>
                <option value="University of Batangas">University of Batangas</option>
            </select>

            <button type="submit">Submit</button>
        </form>
    </main>

    <!-- jQuery for live search -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            $("#search_db").keyup(function() {
                var input = $(this).val();
                if(input != "") {
                    $.ajax({
                        url: "AjaxEx5.php",
                        method: "POST",
                        data: {input: input},
                        success: function(data) {
                            $("#searchresult").html(data);
                            $("#searchresult").css("display", "block"); 
                        }
                    });
                } else {
                    $("#searchresult").css("display", "none");
                }
            });
        });
    </script>

  </body>
</html>
