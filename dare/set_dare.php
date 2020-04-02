<form action="share_dare.php" method="post">
    Enter you name:
    <input type="text" name="dare_from"><br>
    Enter the name of the person to whom you are going to send
    <input type="text" name="dare_to"><br>

    <label for="cars">Type of relation:</label>

    <select id="type_of_relation" name="type_of_relation">
        <option value="Crush">Crush</option>
        <option value="Girlfriend/Boyfriend">Girlfriend/Boyfriend</option>
        <option value="Guy/Girl bestfriend">Guy/Girl bestfriend</option>
    </select><br>

    <button type="submit" name="set_dare">Set Dare</button>
</form>