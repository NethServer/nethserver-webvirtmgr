# Disable byte compiling
%global __os_install_post %(echo '%{__os_install_post}' | sed -e 's!/usr/lib[^[:space:]]*/brp-python-bytecompile[[:space:]].*$!!g')

Summary:    WebVirtMgr panel for manage virtual machine
Name:       nethserver-webvirtmgr
Version: 1.1.0
Release: 1%{?dist}
License:    GPL
URL:        %{url_prefix}/%{name}
Source0:    %{name}-%{version}.tar.gz
BuildArch:  noarch
AutoReq: no

Requires:   nethserver-libvirt
Requires:   webvirtmgr
BuildRequires: nethserver-devtools

%description
WebVirtMgr is a libvirt-based Web interface for managing virtual machines.
It allows you to create and configure new domains, and adjust a domains resource
allocation. A VNC viewer presents a full graphical console to the guest domain.
KVM is currently the only hypervisor supported.

%prep
%setup

%build
%{makedocs}
perl createlinks

%install
rm -rf $RPM_BUILD_ROOT
(cd root; find . -depth -print | cpio -dump $RPM_BUILD_ROOT)
%{genfilelist} $RPM_BUILD_ROOT > %{name}-%{version}-filelist
sed -r -i '/(\.pyc|\.pyo)$/ d' %{name}-%{version}-filelist 

%files -f %{name}-%{version}-filelist
%defattr(-,root,root)
%doc COPYING
%dir %{_nseventsdir}/%{name}-update


%changelog
* Thu Jul 07 2016 Stefano Fancello <stefano.fancello@nethesis.it> - 1.1.0-1
- First NS7 release

* Tue Sep 29 2015 Davide Principi <davide.principi@nethesis.it> - 1.0.1-1
- Make Italian language pack optional - Enhancement #3265 [NethServer]

* Wed Jan 28 2015 Giacomo Sanchietti <giacomo.sanchietti@nethesis.it> - 1.0.0-1.ns6
- First release: KVM - virtual machines - Feature #1761 [NethServer]

