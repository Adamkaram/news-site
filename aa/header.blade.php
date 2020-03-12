<style>


#search_container {
    width: 100%;
    }

    form {
    margin: auto !important;
    }

    form>div {
    background-color: white;
    font-size: 14px;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: start;
    justify-content: flex-start;
    -ms-flex-align: center;
    align-items: center;
    width: 100%;
    max-width: 425px;
    margin: 0 auto;
    border: 1px solid #cccccc;
    overflow: hidden;
    border-radius: 6px;
    }

    form>div i {
    font-size: 18px;
    margin: 0 6px 0 10px;
    }

    form>div .clearButton {
    color: #4975f7;
    font-size: 18px;
    padding: 6px;
    margin: 0 6px 0 2px;
    cursor: pointer;
    visibility: hidden;
    }

    form>div .clearButton:hover {
    color: #1850f5;
    }

    @media all and (-ms-high-contrast: none) {
    form>div .clearButton {
    display: none;
    }
    }

    form>div input[type="text"] {
    -ms-flex-positive: 999999;
    flex-grow: 999999;
    -ms-flex-negative: 1;
    flex-shrink: 1;
    -ms-flex-preferred-size: 90px;
    flex-basis: 90px;
    width: 80%;
    height: 36px;
    padding-left: 3px;
    border: none;
    box-shadow: none;
    outline: none;
    }

    form>div input[type="submit"] {
    color: white;
    background-color: #4975f7;
    letter-spacing: 1.5px;
    -ms-flex-positive: 1;
    flex-grow: 1;
    -ms-flex-negative: 9999;
    flex-shrink: 9999;
    -ms-flex-preferred-size: 80px;
    flex-basis: 80px;
    height: 36px;
    padding: 8px 10px 6px;
    border: none;
    cursor: pointer;
    }

    form>div input[type="submit"]:hover {
    background-color: #1850f5;
    }
</style>
        <div class="col-md-2"  style="margin-top:60px; margin-right:22px; margin-bottom:22px;">
                <div id="search_container">
                    <form action="" method="get" name="searchForm" target="_top">
                            <div>
                                <i class="fa fa-search" aria-hidden="true"></i>
                                <input class="text" type="text" placeholder="  بحث عن" value="" name="p" onkeydown="ClearButton_KeyDown()">
                                <i class="fa fa-times-circle clearButton" aria-hidden="true" id="clear_button"
                                oncdivck="ClearButton_Cdivck()"></i>
                                <input value="بحث" type="submit">
                          </div>
                      </form>
                  </div>
         </div>
        @if(($posts->post() ))
            <div class="md-col-10" id="app">
                    <example-component
                          default_news = "{{$posts->post()}}"
    {{-- /*this func getFirstMediaUrl() related with spatiemedialibrary --}}
                    entity_image = "{{$posts->getFirstMediaUrl('images', 'thumb')}}"
                    />
            </div>
        @endif




