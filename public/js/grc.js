// simplified ajax submit version 5
function simPost(post_data, method, url, success_callback, error_callback)
{
    $.ajax({
        type: method,
        url: url,
        data: post_data,
        cache: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend : function() {
            $('.preloader').addClass('loader').show();
            // $('form').hide();
        },
        success: function (data) {
            success_callback(data);
        },
        error: function (data) {
            error_callback(data)
        },
        complete : function() {
            $('.preloader').removeClass('loader').hide();
            // $('form').show();
        }
    });
}

function simPostFormData(form_data, method, url, success_callback)
{
    $.ajax({
        type: method,
        url: url,
        data: form_data,
        processData: false,
        contentType: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend : function() {
            $('.preloader').addClass('loader').show();
            // $('form').hide();
        },
        success: function (data) {
            success_callback(data);
        },
        error: function (data) {
            console.log(data)
        },
        complete : function() {
            $('.preloader').removeClass('loader').hide();
            // $('form').show();
        }
    });
}

function simPostUpload(post_data, method, url, success_callback, error_callback)
{
    $.ajax({
        type: method,
        url: url,
        data: post_data,
        async: false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend : function() {
            $('.preloader').addClass('loader').show();
            // $('form').hide();
        },
        success: function (data) {
            success_callback(data);
        },
        cache: false,
        contentType: false,
        processData: false,
        error: function (data) {
           success_callback(data);
        },
        complete : function() {
            $('.preloader').removeClass('loader').hide();
            // $('form').show();
        }
    });
}

function addZero(number)
{
    if (number < 10) {
        return number = '0' + number;
    }

    return number;
}

function currentDateTime()
{
    var date = new Date();

    var year = date.getFullYear();
    var month = addZero(date.getMonth() + 1);
    var day = addZero(date.getDate());
    var hours = addZero(date.getHours());
    var minutes = addZero(date.getMinutes());
    var seconds = addZero(date.getSeconds());

    return year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;
}

function currentDate()
{
    var date = new Date();

    var year = date.getFullYear();
    var month = addZero(date.getMonth() + 1);
    var day = addZero(date.getDate());

    return year + '-' + month + '-' + day;
}

function mysqlDateToHtml( post_data )
{
    var final_date = post_data.split('-');
    return final_date[1]+'/'+final_date[2]+'/'+final_date[0];
}

function displayErrors(errors)
{
    $.each(errors, function (key, value) {
        $('#error-' + key).html(value);
        $('.border-' + key).addClass('has-error');
    });
}

// notification message
function pageNotification(target_class, message_type, icon, message_title, message)
{
    var result = $('.'+target_class).html('' +
        '<div class="alert alert-'+message_type+'">' +
            '<i class="fa '+icon+'"></i> <strong>'+message_title+'</strong> '+message+'.' +
        '</div>'

        
    ); 

    return result;
}
async function simPDF(elementID, opt1 = {})
{   
    // OPTIONAL VALUE
    // paper sizes = a0, a1, a2, a3, a4, letter, legal, a5, a6, a7, a8, a9, a10
    // type        = stream or save
    let IDorCLass, pdf, opt, pdfFileBlob
    let option = {
             papersize:   opt1.papersize ?? 'letter',
             filename:    opt1.filename ?? 'file.pdf',
             type:        opt1.type ?? 'save',
             orientation: opt1.orientation ?? 'portrait'
        }
    IDorCLass = document.querySelector('[sim-pdf-id="'+elementID+'"]');
    opt = {
        filename:     option.filename ?? Math.random(),
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: `${window.devicePixelRatio  + 1}` },
        jsPDF:        { unit: 'in', format: option.papersize, orientation: option.orientation}
    };
    pdf = html2pdf().set(opt).from(IDorCLass);
    if(option.type == 'save'){
        pdf.then(() => { setTimeout(() => { pdf.outputImg().save(); }, 2000); });
    }else{
        pdfFileBlob = await pdf.output('bloburl');
        window.open(pdfFileBlob, '_blank')
    }
    console.log(option,pdf)
}

var numberWithCommas = function(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
};

function delay(callback, ms) {
  var timer = 0;
  return function() {
    var context = this, args = arguments;
    clearTimeout(timer);
    timer = setTimeout(function () {
      callback.apply(context, args);
    }, ms || 0);
  };
}

(function(w, d){


    function LetterAvatar (name, size) {

        name  = name || '';
        size  = size || 60;

        var colours = [
                "#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#34495e", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#2c3e50", 
                "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#95a5a6", "#f39c12", "#d35400", "#c0392b", "#bdc3c7", "#7f8c8d"
            ],

            nameSplit = String(name).toUpperCase().split(' '),
            initials, charIndex, colourIndex, canvas, context, dataURI;


        if (nameSplit.length == 1) {
            initials = nameSplit[0] ? nameSplit[0].charAt(0):'?';
        } else {
            initials = nameSplit[0].charAt(0) + nameSplit[1].charAt(0);
        }

        if (w.devicePixelRatio) {
            size = (size * w.devicePixelRatio);
        }
            
        charIndex     = (initials == '?' ? 72 : initials.charCodeAt(0)) - 64;
        colourIndex   = charIndex % 20;
        canvas        = d.createElement('canvas');
        canvas.width  = size;
        canvas.height = size;
        context       = canvas.getContext("2d");
         
        context.fillStyle = colours[colourIndex - 1];
        context.fillRect (0, 0, canvas.width, canvas.height);
        context.font = Math.round(canvas.width/2)+"px Arial";
        context.textAlign = "center";
        context.fillStyle = "#FFF";
        context.fillText(initials, size / 2, size / 1.5);

        dataURI = canvas.toDataURL();
        canvas  = null;

        return dataURI;
    }

    LetterAvatar.transform = function() {

        Array.prototype.forEach.call(d.querySelectorAll('img[avatar]'), function(img, name) {
            name = img.getAttribute('avatar');
            img.src = LetterAvatar(name, img.getAttribute('width'));
            img.removeAttribute('avatar');
            img.setAttribute('alt', name);
        });
    };


    // AMD support
    if (typeof define === 'function' && define.amd) {
        
        define(function () { return LetterAvatar; });
    
    // CommonJS and Node.js module support.
    } else if (typeof exports !== 'undefined') {
        
        // Support Node.js specific `module.exports` (which can be a function)
        if (typeof module != 'undefined' && module.exports) {
            exports = module.exports = LetterAvatar;
        }

        // But always support CommonJS module 1.1.1 spec (`exports` cannot be a function)
        exports.LetterAvatar = LetterAvatar;

    } else {
        
        window.LetterAvatar = LetterAvatar;

        d.addEventListener('DOMContentLoaded', function(event) {
            LetterAvatar.transform();
        });
    }

})(window, document);


function formatNumber(n) {
  // format number 1000000 to 1,234,567
  return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}


function formatCurrency(input, blur) {
  // appends $ to value, validates decimal side
  // and puts cursor back in right position.
  
  // get input value
  var input_val = input.val();
  
  // don't validate empty input
  if (input_val === "") { return; }
  
  // original length
  var original_len = input_val.length;

  // initial caret position 
  var caret_pos = input.prop("selectionStart");
    
  // check for decimal
  if (input_val.indexOf(".") >= 0) {

    // get position of first decimal
    // this prevents multiple decimals from
    // being entered
    var decimal_pos = input_val.indexOf(".");

    // split number by decimal point
    var left_side = input_val.substring(0, decimal_pos);
    var right_side = input_val.substring(decimal_pos);

    // add commas to left side of number
    left_side = formatNumber(left_side);

    // validate right side
    right_side = formatNumber(right_side);
    
    // On blur make sure 2 numbers after decimal
    if (blur === "blur") {
      right_side += "00";
    }
    
    // Limit decimal to only 2 digits
    right_side = right_side.substring(0, 2);

    // join number by .
    // input_val = "$" + left_side + "." + right_side;
    input_val = left_side + "." + right_side;

  } else {
    // no decimal entered
    // add commas to number
    // remove all non-digits
    input_val = formatNumber(input_val);
    // input_val = "PHP " + input_val;
    input_val = input_val;
    
    // final formatting
    if (blur === "blur") {
      input_val += ".00";
    }
  }
  
  // send updated string to input
  input.val(input_val);

  // put caret back in the right position
  var updated_len = input_val.length;
  caret_pos = updated_len - original_len + caret_pos;
  input[0].setSelectionRange(caret_pos, caret_pos);
}


