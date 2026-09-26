        .admin-shell .form-group label,
        .layout .field label {
            color: #344054;
            font-size: .88rem;
            font-weight: 700;
        }

        .admin-shell .form-group input:not([type="file"]):not([type="checkbox"]),
        .admin-shell .form-group textarea,
        .admin-shell .form-group select,
        .layout .field input:not([type="file"]):not([type="checkbox"]),
        .layout .field textarea,
        .layout .field select {
            display: block;
            width: 100%;
            min-height: 52px;
            padding: 12px 15px;
            border: 1.5px solid #d7dce3;
            border-radius: 12px;
            outline: none;
            color: #182230;
            background: linear-gradient(180deg, #ffffff 0%, #fafbfc 100%);
            font: 400 .95rem 'Dubai', sans-serif;
            box-shadow: 0 2px 4px rgba(16, 24, 40, .025), inset 0 1px 2px rgba(16, 24, 40, .025);
            transition: border-color .2s ease, box-shadow .2s ease, background .2s ease;
        }

        .admin-shell .form-group textarea,
        .layout .field textarea {
            min-height: 112px;
            line-height: 1.8;
            resize: vertical;
        }

        .admin-shell .form-group input:not([type="file"]):not([type="checkbox"]):hover,
        .admin-shell .form-group textarea:hover,
        .admin-shell .form-group select:hover,
        .layout .field input:not([type="file"]):not([type="checkbox"]):hover,
        .layout .field textarea:hover,
        .layout .field select:hover {
            border-color: #aeb7c4;
            background: #fff;
        }

        .admin-shell .form-group input:not([type="file"]):not([type="checkbox"]):focus,
        .admin-shell .form-group textarea:focus,
        .admin-shell .form-group select:focus,
        .layout .field input:not([type="file"]):not([type="checkbox"]):focus,
        .layout .field textarea:focus,
        .layout .field select:focus {
            border-color: #d99a00;
            background: #fff;
            box-shadow: 0 0 0 4px rgba(231, 169, 0, .14), 0 3px 10px rgba(16, 24, 40, .05);
        }

        .admin-shell .form-group input::placeholder,
        .admin-shell .form-group textarea::placeholder,
        .layout .field input::placeholder,
        .layout .field textarea::placeholder { color: #98a2b3; }

        .admin-shell .upload-fields input[type="file"],
        .layout .image-card input[type="file"] {
            display: block;
            width: 100%;
            max-width: 100%;
            min-height: 48px;
            padding: 8px;
            border: 1.5px dashed #cbd2dc;
            border-radius: 12px;
            color: #475467;
            background: #f9fafb;
            font: .8rem 'Dubai', sans-serif;
            transition: border-color .2s ease, background .2s ease;
        }

        .admin-shell .upload-fields input[type="file"]:hover,
        .layout .image-card input[type="file"]:hover { border-color: #d99a00; background: #fffdf6; }

        .admin-shell .upload-fields input[type="file"]::file-selector-button,
        .layout .image-card input[type="file"]::file-selector-button {
            margin-left: 9px;
            padding: 7px 11px;
            border: 0;
            border-radius: 8px;
            color: #735100;
            background: #fff2c9;
            font: 700 .78rem 'Dubai', sans-serif;
            cursor: pointer;
        }

        .admin-shell .form-group input:focus-visible,
        .admin-shell .form-group textarea:focus-visible,
        .admin-shell .upload-fields input[type="file"]:focus-visible,
        .layout .field input:focus-visible,
        .layout .field textarea:focus-visible,
        .layout .image-card input[type="file"]:focus-visible {
            outline: 2px solid #d99a00;
            outline-offset: 3px;
        }

        @media (max-width: 520px) {
            .admin-shell .form-group input:not([type="file"]):not([type="checkbox"]),
            .admin-shell .form-group textarea,
            .admin-shell .form-group select,
            .layout .field input:not([type="file"]):not([type="checkbox"]),
            .layout .field textarea,
            .layout .field select { min-height: 50px; padding: 11px 13px; font-size: .92rem; }

            .admin-shell .form-group textarea,
            .layout .field textarea { min-height: 104px; }
        }
