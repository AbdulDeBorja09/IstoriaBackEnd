<div class="attendance-nav">
    <div class="attendance-inner">
    <a href="">
        <img class="navbrand" src="../assets/Images/logo.png" alt=""
    /></a>
    <div class="time-div text-center">
        <p id="time" class="time"></p>
        <p id="currentDate" class="date">s</p>
    </div>
    <a href="attendance_profile.html"
        ><ion-icon name="person-outline" class="avatar-icon"></ion-icon
    ></a>
    </div>
</div>

<script>
    function updateTime() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();
        var ampm = hours >= 12 ? 'PM' : 'AM'; 

        hours = hours % 12; 
        hours = hours ? hours : 12; 

        hours = (hours < 10 ? "0" : "") + hours;
        minutes = (minutes < 10 ? "0" : "") + minutes;
        seconds = (seconds < 10 ? "0" : "") + seconds;
        
        var timeString = hours + ":" + minutes + ":" + seconds + " " + ampm; 
        document.getElementById("time").textContent = timeString;
    }
    setInterval(updateTime, 1000);
    var currentDate = new Date();
    var day = currentDate.getDate();
    var month = currentDate.getMonth() + 1;
    var year = currentDate.getFullYear();
    var formattedDate = month + "/" + day + "/" + year;
    document.getElementById("currentDate").innerHTML = formattedDate;
</script>