<style type="text/css">
</style>

<body>
<h2>Daftar Baru Dosen</h2>
    <form action="daftarBaru_dosen2.php" method="post">
        <table width="785" border="0" >
            <tr>
                <td width="185">Nama</td>                                        
                <td width="600"><input type="text" name="nama" required /></td>
            </tr>
            <tr>
                <td>NIM</td>
                <td><input type="text" name="nip"/></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" required /></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" required /></td>
            </tr>
            <tr>
                <td>Semester</td>
                <td><input type="text" name="semester"/></td>
            </tr>
            <tr>
                <td>Mata Kuliah</td>
                <td><input type="text" name="matkul"/></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email"/></td>
            </tr>
            <tr>
                <td>No Telp</td>
                <td><input type="text" name="notel"/></td>
            </tr>
            <tr>
                <td height="68" align="right"><input type="reset" value="reset" class="tombol_sc"/></td>  
                <td><input type="submit" value="submit" class="tombol_sc" /></td>    
            </tr>
        </table>
    </form>
</body>