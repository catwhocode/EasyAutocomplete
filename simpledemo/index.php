<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/easy-autocomplete.min.css" rel="stylesheet">

        <title>.</title>
    </head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>pawelczak/EasyAutocomplete</h3>
            </div>
        </div>
        <form class="form" action="" method="post" id="frmMain">
            <div class="row">
                <div class="col">
                    <label class="form-label" for="country">Country:</label>
                    <input class="form-control" name="country" id="country" />
                </div>

                <div class="col">
                    <label class="form-label" for="content">Result:</label>
                    <input class="form-control" name="content" id="content" />
                </div>
            </div>
        </form>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.easy-autocomplete.min.js"></script>

    <script>
    $(document).ready(function(){        
        var options = {
            url: function(phrase) {
		        return "search.php?country=" + phrase + "&format=json";
	        },
            getValue: "name",
            list: {
		        onClickEvent: function() {
			        const name = $("#country").getSelectedItemData().name;                   
                    const code = $("#country").getSelectedItemData().code;
                    const combined = name + ' | ' + code;
			        $("#content").val(combined).trigger("change");
		        }	
	        }
        };

        $("#country").easyAutocomplete(options);
    });
    </script>

</body>
</html>
