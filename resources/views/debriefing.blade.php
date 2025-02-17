<x-app-layout>
    <x-slot name="slot">
        <div class="min-h-screen bg-gray-200 flex justify-center items-center">
            <div class="p-12 m-10 bg-white rounded-2xl shadow-xl z-20">
                <div class="text-3xl font-bold text-left mb-5 cursor-pointer">We're almost done...
                </div>
                <div class="text-lg pt-3 font-bold italic"> What was the real purpose of this study?</div>
                <p class="text-xl max-w-2xl text-left pt-3">
                    When we invited you to participate in the study, we told you that the purpose of the study
                    was to evaluate an email client. <br>
                    Specifically, <span class="font-bold" style="color:darkred">to avoid influencing your actions in any way,
                    we did not report that the specific objective was to evaluate the effectiveness of warning
                    dialogues </span> that are generated by an Artificial Intelligence displayed in the case of suspicious
                    phishing emails (specifically, the GPT-4o Large Language Model).<br>
                    In fact, knowing in advance the true purpose of the study would have caused you to be primed towards
                    a safer behaviour, and your actions in the presence of the warnings would have not been
                    ecologically valid.
                </p>

                <div class="text-lg pt-3 font-bold italic"> What were the possible risks of taking part in the study?</div>
                <p class="text-xl max-w-2xl text-left pt-3">
                    There was no actual risk in participating in this study. The “phishing” emails you were
                    exposed to were actually harmless emails that were specifically handcrafted for this study
                    (and were never sent to your real mail client). Moreover, any link in them was disabled to
                    prevent you from accessing any external website.
                </p>

                <div class="text-lg pt-3 font-bold italic"> What if I changed my mind about taking part?</div>
                <p class="text-xl max-w-2xl text-left pt-3">
                    As was already stated in the information sheet, you are free withdraw at any point of the
                    study, without having to give a reason. Therefore, you can decide to withdraw from the
                    study now by closing your browser (or this tab) or pressing the “I want to leave the study”
                    button at the bottom of this page. In the case you abandon the study, any information you
                    have submitted and any data related to your interaction with the system will be
                    automatically deleted in a secure manner. However, if you decide to leave the study now,
                    please consider that you won’t be able to receive your participation reward from Prolific.<br>
                    For any further clarification about the study please contact:
                    <br><br>
                    Prof. Luca Viganò: <a href="mailto:luca.vigano@kcl.ac.uk">luca.vigano@kcl.ac.uk</a>, <a href="tel:+44 (0)20 78482078">+44 (0)20 78482078</a>
                    <br><br>
                    (N)7.18<br>
                    Bush House<br>
                    Strand campus, 30 Aldwych, London, WC2B 4BG
                    <br><br>
                    Prof. Luca Viganò: <a href="mailto:luca.vigano@kcl.ac.uk">luca.vigano@kcl.ac.uk</a>, <a href="tel:+44 (0)20 78482078">+44 (0)20 78482078</a>
                </p>

                <div class="text-lg pt-3 font-bold italic"> What happens if I would like to continue my participation?
                </div>
                <p class="text-xl max-w-2xl text-left pt-3">
                    If you wish to remain and complete the study, the data provided thus far will be included in
                    our research. Moreover, you will be presented with a series of questionnaires to complete
                    your participation. We would like to remind you that all the data you provide in the
                    questionnaire will be completely anonymous. Therefore, once you have sent your
                    answers, it will not be possible to withdraw the data you have provided, as they cannot be
                    linked to specific individuals. <br>
                    The questions in the questionnaire will mostly be closed-ended and will regard the
                    evaluation of the warnings you were exposed to, plus some questions to evaluate your
                    knowledge in cybersecurity. Finally, you will be asked to provide your Prolific ID to receive
                    your reward for your participation.
                    <br>
                    Examples of these questions are:
                    <i>“Please rate the extent of risk you feel you were warned about.”</i> and
                    <i>“Which of the following four passwords is the most secure?”</i>

                </p>

                <div class="text-center mt-10">
                    <div class="w-full">
                        <div class="flex flex-row">
                            <button id="refuse_btn" style="margin: 0 1rem;"
                                    class="py-3 w-1/2 text-lg text-white bg-blue-500 hover:bg-blue-800 rounded-2xl"> I want to leave the study
                            </button>
                            <button style="margin: 0 1rem;" onclick="window.location.replace('{{ route('post_test') }}')"
                                    class="py-3 w-1/2 text-lg text-white bg-blue-500 hover:bg-blue-800 rounded-2xl"> I confirm I want to complete the study
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div id="confirmModal" class="relative z-10 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                    <!-- Background backdrop -->
                    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" aria-hidden="true"></div>

                    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                            <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg">
                                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                                    <div class="sm:flex sm:items-start">
                                        <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                            <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                            </svg>
                                        </div>
                                        <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                            <h2 class="text-lg font-semibold">Are you sure you want to leave the study before completing it?</h2>
                                            <p class="mt-2">We won't be able to pay you for your partial participation.
                                                <br> All the information that you've submitted and the interaction logs will be deleted automatically
                                                and thus not included in the research project.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                    <button id="confirmButton" class="inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto">Leave the study </button>
                                    <button id="cancelButton" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Stay in the study</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="module">
            $(function () {
                // When a link with the button refuse_btn is clicked
                $('#refuse_btn').on('click', function (e) {
                    e.preventDefault();  // Prevent the default action
                    $('#confirmModal').removeClass('hidden');  // Show the modal
                });

                // When the cancel button is clicked
                $('#cancelButton').on('click', function () {
                    $('#confirmModal').addClass('hidden');  // Hide the modal
                });

                // When the confirm button is clicked
                $('#confirmButton').on('click', function () {
                    window.location.replace('{{route("no_consent")}}');  // Redirect to the stored URL
                });
            });
        </script>
    </x-slot>
</x-app-layout>
