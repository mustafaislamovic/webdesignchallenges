var PrimaryService = {
    init: function(){
      $('#addDesignForm').validate({
        submitHandler: function(form) {
          var todo = Object.fromEntries((new FormData(form)).entries());
          PrimaryService.add(todo);
        }
      });
      PrimaryService.list();
    },

    list: function(){
      $.get("rest/tableone", function(data) {
        $("#tableone-list").html("");
        var html = "";
        for(let i = 0; i < data.length; i++){
          html += `
          <div class="col-lg-4">
            <h2>`+ data[i].created +`</h2>
            <p>`+ data[i].description +`</p>
            <p>
              <div class="btn-group" role="group">
                <button type="button" class="btn btn-primary todo-button" onclick="PrimaryService.get(`+data[i].id+`)">Edit</button>
                <button type="button" class="btn btn-danger todo-button" onclick="PrimaryService.delete(`+data[i].id+`)">Delete</button>
              </div>
            </p>
          </div>`;
        }
        $("#tableone-list").html(html);
      });
    },

    get: function(id){
      $.get('rest/todos/'+id, function(data){
        $("#description").val(data.description);
        $("#id").val(data.id);
        $("#created").val(data.created);
        $("#exampleModal").modal("show");
      })
    },

    add: function(todo){
      $.ajax({
        url: 'rest/tableone',
        type: 'POST',
        data: JSON.stringify(todo),
        contentType: "application/json",
        dataType: "json",
        success: function(result) {
            $("#tableone-list").html('<div class="spinner-border" role="status"> <span class="sr-only"></span>  </div>');
            PrimaryService.list(); // perf optimization
            $("#addDesignModal").modal("hide");
        }
      });
    },

    update: function(){
      var design = {};

      todo.description = $('#description').val();
      todo.created = $('#created').val();

      $.ajax({
        url: 'rest/tableone/'+$('#id').val(),
        type: 'PUT',
        data: JSON.stringify(todo),
        contentType: "application/json",
        dataType: "json",
        success: function(result) {
            $("#exampleModal").modal("hide");
            $("#tableone-list").html('<div class="spinner-border" role="status"> <span class="sr-only"></span>  </div>');
            PrimaryService.list(); // perf optimization
        }
      });
    },

    delete: function(id){
      $.ajax({
        url: 'rest/tableone/'+id,
        type: 'DELETE',
        success: function(result) {
            $("#tableone-list").html('<div class="spinner-border" role="status"> <span class="sr-only"></span>  </div>');
            PrimaryService.list();
        }
      });
    },
}