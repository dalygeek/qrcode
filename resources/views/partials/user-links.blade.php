



@if (isset($links) && count($links) > 0)
    {{-- <section class="section" style="margin-top: -80px">
        <div class="container">
            <h2 class="title is-4">Vos codes QR dynamiques</h2>
            <div class="content">
                <ol>
                    @foreach ($links as $link)
                        <li><a @click="fireModal('{{ $link->id }}')">{{ $link->name }}</a></li>
                        <modal-qr 
                            ref="{{ $link->id }}" 
                            static-link="{{ $link->static_link }}"
                            set-name="{{ $link->name }}"
                            set-description="{{ $link->description }}"
                            set-link="{{ $link->dynamic_link }}"
                            >
                        </modal-qr>
                    @endforeach
                </ol>
            </div>
        </div>


    </section> --}}
<br><br>
<div class="control">
<input  class="input" type="text" id="myInput" onkeyup="myFunction()"  style="float: right ; width: 180px;margin-right:30px" placeholder="Rechercher Votre QR ..">
</div>
<br>
<hr>
    <div class="container">

        <div id="myUL" class="columns is-multiline is-desktop">
            @foreach ($links as $link)

            <div class="column is-one-quarter">
                
              <lop>
                    <a @click="fireModal('{{ $link->id }}')">
                    <img src="https://i.ibb.co/CJ0SN1P/thorOne.png" alt="">
                   <div class="has-text-centered is-size-4"> {{ $link->name }} </div> </a>
                <modal-qr 
                    ref="{{ $link->id }}" 
                    static-link="{{ $link->static_link }}"
                    set-name="{{ $link->name }}"
                    set-description="{{ $link->description }}"
                    set-link="{{ $link->dynamic_link }}"
                    >
                </modal-qr>
              </lop>

            </div>

            @endforeach
  
        </div>
        <br><br>
    </div>
@endif

<script>
    function myFunction() {
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        ul = document.getElementById("myUL");
        li = ul.getElementsByTagName("lop");
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }
</script>
