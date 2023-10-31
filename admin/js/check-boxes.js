/*----------------------------------------------------
    Block and Delete button disable based on checkboxes
------------------------------------------------------*/

document.querySelectorAll('#myTable input[type="checkbox"]').forEach(function (checkbox) {
    checkbox.addEventListener('change', function () {
        var path = window.location.pathname;
        var page = path.split("/").pop();
        var a = document.querySelectorAll('#myTable input[type="checkbox"]:checked').length;
        if (a > 0) 
        {
            document.getElementById('deleteSelected').classList.remove('disabled');

            /* ----------------------------------- block / unblock ---------------------------------- */
            if(page == "blocked.php")
            {
                document.getElementById('unblockSelected').classList.remove('disabled');
            }
            else
            {
                document.getElementById('blockSelected').classList.remove('disabled');
            }
            /* ----------------------------------- block / unblock ---------------------------------- */

        } 
        else 
        {
            document.getElementById('deleteSelected').classList.add('disabled');

            /* ----------------------------------- block / unblock ---------------------------------- */
            if(page == "blocked.php")
            {
                document.getElementById('unblockSelected').classList.add('disabled');
            }
            else
            {
                document.getElementById('blockSelected').classList.add('disabled');
            }
            /* ----------------------------------- block / unblock ---------------------------------- */

        }
    });
});


/*----------------------------------------------------
    Check all checkboxes
------------------------------------------------------*/

document.querySelector('#myTable #checkAll').addEventListener('click', function () {
    var isChecked = this.checked;
    var checkboxes = document.querySelectorAll('#myTable tr:has(td) input[type="checkbox"]');

    checkboxes.forEach(function (checkbox) {
        checkbox.checked = isChecked;
    });
});

var checkboxes = document.querySelectorAll('#myTable tr:has(td) input[type="checkbox"]');
var checkAllCheckbox = document.querySelector('#checkAll');

checkboxes.forEach(function (checkbox) {
    checkbox.addEventListener('click', function () {
        var isChecked = this.checked;
        var isHeaderChecked = checkAllCheckbox.checked;

        if (!isChecked && isHeaderChecked) {
            checkAllCheckbox.checked = isChecked;
        } else {
            var allUnchecked = true;

            checkboxes.forEach(function (checkbox) {
                if (!checkbox.checked) {
                    allUnchecked = false;
                }
            });
            checkAllCheckbox.checked = allUnchecked;
        }
    });
});