<div  class="modal mod-news"><!-- Сaмo oкнo -->
    <span id="modal_close">X</span> <!-- Кнoпкa зaкрыть -->
    <form id="newsform" >
        <div class="form-group text">
            <label for="inputteme">title</label>
            <input name="tema" type="text" class="form-text" id="inputtema" placeholder="theme news">
        </div>
        <div class="form-group text">
            <label for="date">Date</label>
            <input name="date" type="text" placeholder="date" id="datepicker">
        </div>
        <div class="form-group textarea">
            <label for="summernote">news</label>
            <textarea name="text" rows="5" cols="40" class="form-textarea" id="summernote"></textarea>
        </div>

        <p id="alert"></p>
        <button type="submit" class="ok_btn">OK</button>
    </form>
</div>
<div class="overlay"></div><!-- Пoдлoжкa -->