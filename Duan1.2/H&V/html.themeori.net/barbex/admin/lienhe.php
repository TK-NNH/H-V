
<style>
    h1 {
        text-align: center;
    }

    th, td {
        padding: 10px;
        margin: 10px;
        white-space: nowrap;
        border: 1px solid black;
    }

    .thoigian-column {
        width: 10%; 
    }

    .name-column {
        width: 10%; 
    }

    .email-column {
        width: 10%; 
    }

    .sdt-column {
        width: 10%; 
    }

    .loinhan-column {
        width: 60%; 
        max-width: 400px; 
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    table {
        border: 1px solid black;
        align-items: center;
        width: 100%;
        text-align: center;
        border-collapse: collapse;
    }

   
</style>
<div class="row2"  style="margin: 150px;">
    <div class="row2 font_title">
        <h1>DANH SÁCH LIÊN HỆ</h1>
    </div>
    <div class="row2 form_content ">
        <table style="margin-top: 10px;">
            <tr>
                <th class="thoigian-column">Thời gian</th>
                <th class="name-column">Tên</th>
                <th class="email-column">Email</th>
                <th class="sdt-column">Số điện thoại</th>
                <th class="loinhan-column">Lời nhắn</th>
            </tr>
            <?php
            foreach ($listlienhe as $lienhe) {
                extract($lienhe);
                echo '<tr>
                    <td class="thoigian-column">' . $thoigian . '</td>
                    <td class="name-column">' . $name . '</td>
                    <td class="email-column">' . $email . '</td>
                    <td class="sdt-column">' . $sdt . '</td>
                    <td class="loinhan-column">' . $loinhan . '</td>
                </tr>';
            }
            ?>
        </table>
    </div>
</div>
