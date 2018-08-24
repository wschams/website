/*global $, pcs*/
(function () {
    "use strict";

    var contactTable = $("#contactTable tbody");
    var contacts = [];
    var oldContactRow;
    var firstNameInput = $("#first");
    var lastNameInput = $("#last");
    var emailInput = $("#email");
    var phoneInput = $("#phone");
    var addContactForm = $("#addContactForm");
    var oldContactId;
    var maxId;

    function addContact(contact) {
        contacts.push(contact);

        if (contacts.length === 1) {
            contactTable.empty();
        }

        var theRow = $('<tr>' +
            '<td>' + contact.firstName + '</td>' +
            '<td>' + contact.lastName + '</td>' +
            '<td>' + contact.email + '</td>' +
            '<td>' + contact.phone + '</td>' +
            '<td><button id = "a">update</button></td><td><button id = "b">delete</button></td>' +
            '</tr>'
        ).appendTo(contactTable);
        theRow.find('#b')
            .click(function () {
                $.post("deleteContact.php", { id: contact.id }, function () {
                    theRow.remove();
                }).fail(function (jqxhr) {
                    pcs.messagebox.show("Error: " + jqxhr.responseText);
                });
            });
        theRow.find('#a')
            .click(function () {
                oldContactId = contact.id;
                oldContactRow = theRow;
                addContactForm.slideDown();
                firstNameInput.val(contact.firstName);
                lastNameInput.val(contact.lastName);
                emailInput.val(contact.email);
                phoneInput.val(contact.phone);
            });
    }

    function hideAddContactForm() {
        addContactForm.slideUp();
        addContactForm[0].reset();
    }

    addContactForm.on("submit", function (event) {
        if (!oldContactRow) {
            maxId++;
            var newContact = {
                firstName: firstNameInput.val(),
                lastName: lastNameInput.val(),
                email: emailInput.val(),
                phone: phoneInput.val(),
                id: maxId
            };

            $.post("addContact.php", newContact, function () {
                addContact(newContact);
                hideAddContactForm();
            }).fail(function (jqxhr) {
                pcs.messagebox.show("Error: " + jqxhr.responseText);
            });
        } else {
            var updatedContact = {
                firstName: firstNameInput.val(),
                lastName: lastNameInput.val(),
                email: emailInput.val(),
                phone: phoneInput.val(),
                id: oldContactId
            };
            $.post("updateContact.php", updatedContact, function () {
                addContact(updatedContact);
                oldContactRow.remove();
                hideAddContactForm();
            }).fail(function (jqxhr) {
                pcs.messagebox.show("Error: " + jqxhr.responseText);
            });
        }
        event.preventDefault();
    });

    $("#cancel").click(hideAddContactForm);

    $("#add").click(function () {
        addContactForm.slideDown();
    });

    $("#load").click(function () {
        $.get("getContacts.php", function (loadedContactData) {
            var loadedContacts = JSON.parse(loadedContactData);
            loadedContacts.forEach(addContact);
        }).fail(function (jqxhr) {
            pcs.messagebox.show("Error: " + jqxhr.responseText);
        });
    });
    $("#load").click(function () {
        $.get("getMaxId.php", function (loadedMaxId) {
            var m = JSON.parse(loadedMaxId);
            maxId = m.id;
        }).fail(function (jqxhr) {
            pcs.messagebox.show("Error: " + jqxhr.responseText);
        });
    });
}());