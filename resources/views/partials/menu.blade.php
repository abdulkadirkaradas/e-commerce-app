<div class="menu-container">
    <div class="menu">
        <ul class="menu-categories">
        </ul>
    </div>
</div>

@section('scripts')
@parent

<script>

    $(document).ready(function(){
        getCategories();
    });

    function getCategories() {
        $.ajax({
            type:'POST',
            url:'{{ env("API_URL") }}/get-all-categories',
            headers: {
                'App-Key' : '{{ env("API_KEY") }}',
                'Access-Control-Allow-Origin' : '{{ env("REQUEST_URL") }}',
                'Access-Control-Allow-Credentials' : 'true',
                'Access-Control-Max-Age' : '10800'
            },
            success: function(data) {
                if(data.status == "0_SUCCESS") {
                    $.each(data.data, function(i, val){
                        $(".menu-categories").append(
                            `<li class="no-select" data-id="` + val.id + `">` + val.category_name + `</li>`
                        );
                    });
                }
            }
        });
    }

</script>

@endsection
