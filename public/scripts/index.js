$(document).ready(function () {
    const apiUrl = `urlShortner/api/index.php`

    function isValidURL(url) {
        var pattern = /^(https?:\/\/)?([\w\d-]+\.)+[\w\d]{2,}(:\d+)?(\/[\w\d#?&=.-]*)*\/?$/i;
        return pattern.test(url);
    }

    let $urlInput = $("input[name='url']");
    let $errorElement = $urlInput.next("p");
    let $submitButton = $("button[type='submit']");
    let $copyButton = $("#copy-url");

    function validateURL() {
        let url = $urlInput.val().trim();

        if (url === "") {
            $errorElement.text("❌ URL field cannot be empty").addClass("text-red-500").removeClass("text-green-500");
            disableButton($submitButton);
        } else if (!isValidURL(url)) {
            $errorElement.text("❌ Please enter a valid URL (e.g., https://example.com)").addClass("text-red-500").removeClass("text-green-500");
            disableButton($submitButton);
        } else {
            $errorElement.text("✅ URL is valid").removeClass("text-red-500").addClass("text-green-500");
            enableButton($submitButton);
        }
    }

    function showShortenedURL(url) {
        $("#shortened-url").val(url);
        $("#shortened-url-container").removeClass("hidden");
    }

    function hieShortenedURL() {
        $("#shortened-url").val('');
        $("#shortened-url-container").addClass("hidden");
    }

    function disableButton(button) {
        button.prop("disabled", true).addClass("opacity-50 cursor-not-allowed");
    }

    function enableButton(button) {
        button.prop("disabled", false).removeClass("opacity-50 cursor-not-allowed");
    }

    $urlInput.on("input", () => {
        hieShortenedURL();
        validateURL()
    });
    disableButton($submitButton);

    async function shortenURL() {
        let url = $urlInput.val().trim();
        if (!isValidURL(url)) return;

        // Disable input & button while processing
        disableButton($submitButton);
        $submitButton.addClass("loading");

        try {
            let response = await $.ajax({
                url: `${location.origin}/${apiUrl}`,
                method: "POST",
                contentType: "application/json",
                data: JSON.stringify({ url: url }),
            });

            if (response.success) {
                $errorElement.text(`✅ Shortened URL: ${response.short_url}`)
                    .removeClass("text-red-500")
                    .addClass("text-green-500");
                $(".form")[0].reset();
                $submitButton.removeClass("loading");
                disableButton($submitButton)
                $errorElement.text('We respect your privacy and we do not share you public urls to third party !')[0].className = "text-gray-400 mt-2"
                showShortenedURL(response.short_url);
                return;
            } else {
                $errorElement.text("❌ Failed to shorten URL. Try again.")
                    .addClass("text-red-500")
                    .removeClass("text-green-500");
            }
        } catch (error) {
            $errorElement.text("❌ Server error. Please try again later.")
                .addClass("text-red-500")
                .removeClass("text-green-500");
        }

        enableButton($submitButton);
        $submitButton.removeClass("loading");
    }

    $copyButton.click(async function () {
        let inputField = $("#shortened-url");
        let button = $(this);

        try {
            button.addClass('loading');
            await navigator.clipboard.writeText(inputField.val());
        } catch (error) {
            alert("Failed to copy!");
        }
        button.removeClass('loading');
    });

    $submitButton.on("click", function (e) {
        e.preventDefault();
        shortenURL();
    });
});
