<form action="{{url('/student/update/'.$student->id)}}" method='post'>
    @csrf
    <table>
        <tr>
            <td>学生姓名</td>
            <td><input type="text" name='name' value="{{$student->name}}"></td>
        </tr>
        <tr>
            <td>学生性别</td>
            <td>
                <input type="radio" value='1' name='sex'>男
                <input type="radio" value='2' name='sex'>女
            </td>
        </tr>
        <tr>
            <td>学生班级</td>
            <td><input type="text" name='class' value="{{$student->class}}"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value='修改'></td>
        </tr>
    </table>
</form>