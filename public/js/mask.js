function applyMask(element, mask) {
    const value = element.value.replace(/\D/g, "");
    const maskArray = mask.split("");

    let maskedValue = "";

    for (let i = 0, j = 0; i < maskArray.length && j < value.length; i++) {
        if (maskArray[i] === "0") {
            maskedValue += value[j];
            j++;
        } else {
            maskedValue += maskArray[i];
        }
    }

    element.value = maskedValue;
}

document.addEventListener("DOMContentLoaded", function () {
    const maskInputs = document.querySelectorAll("[data-mask]");

    maskInputs.forEach((input) => {
        const maskType = input.getAttribute("data-mask");

        if (maskType === "cpf") {
            input.addEventListener("input", function () {
                applyMask(this, "000.000.000-00");
            });
        } else if (maskType === "phone") {
            input.addEventListener("input", function () {
                applyMask(this, "(00) 00000-0000");
            });
        } else if (maskType === "cep") {
            input.addEventListener("input", function () {
                applyMask(this, "00000-000");
            });
        } else if (maskType === "cns") {
            input.addEventListener("input", function () {
                applyMask(this, "000.0000.0000.0000");
            });
        } else if (maskType === "cnpj") {
            input.addEventListener("input", function () {
                applyMask(this, "00.000.000/0000-00");
            });
        }
    });
});
