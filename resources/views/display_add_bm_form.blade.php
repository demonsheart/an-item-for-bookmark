@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form name="bm_table" action="./add_bms" method="post">
    <div class="formblock">
        <h2>New Bookmark</h2>
        <p>
            <input type="text" name="new_url" id="new_url" size="40" maxlength="255" value="https://" required /></p>
            {{ csrf_field() }}
            <button type="submit">Add Bookmark</button>
    </div>
</form>