var NoteService = {
    init: function(){
      $('#addNoteForm').validate({
        submitHandler: function(form) {
          var entity = Object.fromEntries((new FormData(form)).entries());
          NoteService.add(entity);
        }
      });
      NoteService.list();
    },

    list: function(){
      $.get("rest/notes", function(data) {
        $("#note-list").html("");
        var html = "";
        for(let i = 0; i < data.length; i++){
          html += `
          <div class="col">
            <div class="card" style="background-color:`+data[i].color+`">
              <img class="card-img-top" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" alt="Card image cap">
              <div class="card-body font-monospace text-center">
                <h5 class="card-title">`+ data[i].name +`</h5>
                <p class="card-text">`+ data[i].description +`</p>
                <div class="btn-group" role="group">
                  <button type="button" class="btn btn-primary note-button" onclick="NoteService.get(`+data[i].id+`)">Update</button>
                  <button type="button" class="btn btn-danger note-button" onclick="NoteService.delete(`+data[i].id+`)">Delete</button>
                </div>
              </div>
            </div>
          </div>
          `;
        }
        $("#note-list").html(html);
      });
    },

    get: function(id){
      $('.note-button').attr('disabled', true);
      $.get('rest/notes/'+id, function(data){
        $("#description").val(data.description);
        $("#id").val(data.id);
        $("#created").val(data.created);
        $("#exampleModal").modal("show");
        $('.design-button').attr('disabled', false);
      })
    },

    add: function(note){
      $.ajax({
        url: 'rest/notes',
        type: 'POST',
        data: JSON.stringify(note),
        contentType: "application/json",
        dataType: "json",
        success: function(result) {
            $("#note-list").html('<div class="spinner-border" role="status"> <span class="sr-only"></span>  </div>');
            NoteService.list(); // perf optimization
            $("#addNoteModal").modal("hide");
        }
      });
    },

    update: function(){
      $('.save-note-button').attr('disabled', true);
      var design = {};

      todo.description = $('#description').val();
      todo.created = $('#created').val();

      $.ajax({
        url: 'rest/notes/'+$('#id').val(),
        type: 'PUT',
        data: JSON.stringify(todo),
        contentType: "application/json",
        dataType: "json",
        success: function(result) {
            $("#exampleModal").modal("hide");
            $('.save-note-button').attr('disabled', false);
            $("#note-list").html('<div class="spinner-border" role="status"> <span class="sr-only"></span>  </div>');
            DesignService.list(); // perf optimization
        }
      });
    },

    delete: function(id){
      $('.note-button').attr('disabled', true);
      $.ajax({
        url: 'rest/notes/'+id,
        type: 'DELETE',
        success: function(result) {
            $("#note-list").html('<div class="spinner-border" role="status"> <span class="sr-only"></span>  </div>');
            NoteService.list();
        }
      });
    },

    choose_color: function(color){
      $('#addNoteForm input[name="color"]').val(color);
    }
}
