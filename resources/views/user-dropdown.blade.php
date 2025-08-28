<!DOCTYPE html>
<html>

<head>
    <script>
        function showUser(str) {
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            }

            console.log("Selected user ID:", str);

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "/get-user-info?q=" + str, true);
            xmlhttp.send();
        }
    </script>
</head>

<body>

    <form>
        <select name="users" onchange="showUser(this.value)">
            <option value="">Select a user:</option>
            @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </form>

    <br>
    <div id="txtHint"><b>User info will be listed here.</b></div>

</body>

</html>