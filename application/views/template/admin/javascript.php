

<!-- Reference block for JS -->
        <div class="ref" id="ref">
            <div class="color-primary"></div>
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
            </div>
        </div>        
        <<script>
            <!-- กำหนดตัวอักษรในช่อง input อยากได้ตัวไรเพิ่มใน var allowed ได้เลย-->
	function ValidateKey() 
	{   
	   var key=window.event.keyCode;
	   var allowed='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ.^_+-*@"\'0123456789';

		return allowed.indexOf(String.fromCharCode(key)) !=-1 ;
	}
        </script>
    </body>

</html>