<form action='http://localhost:8888/gam/' method='get'>
  <div class='input-field'>
    <label for='search'>Search For:</label>
    <span><input type='text' name='s' id='search' value='<?php the_search_query(); ?>' /></span>
  </div>
  <input type='submit' name='submit' value='submit' />
</form>
