<?php include '../../../include/header.php' ?>


<script src="js/Gematrinate3.js"></script>
<link rel="stylesheet" type="text/css" href="css/Calculator3.css">

<?php include '../../../include/menu.php' ?>


<center>
    <table>
        <tbody>
            <tr>
                <td colspan="4">
                    <font size="2" color="Orange">Click a cipher name to see the breakdown.</font>
                    <form>
                        <div class="gematria_title">Enter Search Word or Phrase:</div>
                        <input type="text" id="SearchString" onkeyup="pop_Sums()" style="font-size: 24; width: 400px">
                    </form>
                </td>
            </tr>
            <tr>
                <td class="reduced td_name" id="reduced_header"><a href="javascript:pop_Breakdown('Reduced');">Reduced</a></td>
                <td class="s_exception td_name" id="s_exception_header"><a href="javascript:pop_Breakdown('S Exception');">S Exception</a></td>
                <td class="reverse_reduced td_name" id="reverse_reduced_header"><a href="javascript:pop_Breakdown('Reverse Reduced');">Reverse Reduced</a></td>
                <td class="septenary td_name" id="septenary_header"><a href="javascript:pop_Breakdown('Septenary');">Septenary</a></td>
            </tr>
            <tr>
                <td class="reduced td_number" id="reduced_sum">0</td>
                <td class="s_exception td_number" id="s_exception_sum">0</td>
                <td class="reverse_reduced td_number" id="reverse_reduced_sum">0</td>
                <td class="septenary td_number" id="septenary_sum">0</td>
            </tr>
            <tr>
                <td class="ordinal td_name" id="ordinal_header"><a href="javascript:pop_Breakdown('Ordinal');">Ordinal</a></td>
                <td class="reverse_ordinal td_name" id="reverse_ordinal_header"><a href="javascript:pop_Breakdown('Reverse Ordinal');">Reverse Ordinal</a></td>
                <td class="francis_bacon td_name" id="francis_bacon_header"><a href="javascript:pop_Breakdown('Francis Bacon');">Francis Bacon</a></td>
                <td class="sumerian td_name" id="sumerian_header"><a href="javascript:pop_Breakdown('Sumerian');">Sumerian</a></td>
            </tr>
            <tr>
                <td class="ordinal td_number" id="ordinal_sum">0</td>
                <td class="reverse_ordinal td_number" id="reverse_ordinal_sum">0</td>
                <td class="francis_bacon td_number" id="francis_bacon_sum">0</td>
                <td class="sumerian td_number" id="sumerian_sum">0</td>
            </tr>
            <tr>
                <td class="kv_exception td_name" id="kv_exception_header"><a href="javascript:pop_Breakdown('K/V Exception');">K/V Exception</a></td>
                <td class="ksv_exception td_name" id="ksv_exception_header"><a href="javascript:pop_Breakdown('K/S/V Exception');">K/S/V Exception</a></td>
                <td class="chaldean td_name" id="chaldean_header"><a href="javascript:pop_Breakdown('Chaldean');">Chaldean</a></td>
                <td class="h_exception td_name" id="h_exception_header"><a href="javascript:pop_Breakdown('H Exception');">H Exception</a></td>
            </tr>
            <tr>
                <td class="kv_exception td_number" id="kv_exception_sum">0</td>
                <td class="ksv_exception td_number" id="ksv_exception_sum">0</td>
                <td class="chaldean td_number" id="chaldean_sum">0</td>
                <td class="h_exception td_number" id="h_exception_sum">0</td>
            </tr>
            <tr>
                <td class="jewish td_name" id="jewish_header"><a href="javascript:pop_Breakdown('Jewish');">Jewish</a></td>
                <td class="english td_name" id="english_header"><a href="javascript:pop_Breakdown('English');">English</a></td>
                <td class="satanic td_name" id="satanic_header"><a href="javascript:pop_Breakdown('Satanic');">Satanic</a></td>
                <td class="alw td_name" id="alw_header"><a href="javascript:pop_Breakdown('ALW');">ALW</a></td>
            </tr>
            <tr>
                <td class="jewish td_number" id="jewish_sum">0</td>
                <td class="english td_number" id="english_sum">0</td>
                <td class="satanic td_number" id="satanic_sum">0</td>
                <td class="alw td_number" id="alw_sum">0</td>
            </tr>
            <tr>
                <td colspan="4" class="Breakdown" id="BrokenDown"></td>
            </tr>
        </tbody>
    </table>

    <p></p>

    Go to the <a href="{{route('calculator')}}">
        <font color="#00ffff">Newest version</font>
    </a> of the calculator<p></p>
</center>

<?php include '../../../include/footer.php' ?>