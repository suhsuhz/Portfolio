
<form action="Test/insert" method="post" enctype="multipart/form-data">
		<table border="">
            <tr>
                <td>제목</td>
                <td width="300"><input type="text" name="title">
                </td>
            </tr>
          
            <tr>
                <td>파일</td>
                <td><input type="file" name="upfile">
                </td>
            </tr>
            <tr>
                <td>내용</td>
                <td><textarea name="content"></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="reset" value="초기화">
                    <input type="submit" name="submit" value="Submit">
                    <a href="index">목록</a>
                </td>
            </tr>
        </table>
</form>