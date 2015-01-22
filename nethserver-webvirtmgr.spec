# Disable byte compiling
%global __os_install_post %(echo '%{__os_install_post}' | sed -e 's!/usr/lib[^[:space:]]*/brp-python-bytecompile[[:space:]].*$!!g')

Summary:    WebVirtMgr panel for manage virtual machine
Name:       nethserver-webvirtmgr
Version:    0.0.1
Release:    1%{?dist}
License:    GPL
URL:        %{url_prefix}/%{name}
Source0:    %{name}-%{version}.tar.gz
BuildArch:  noarch

Requires:   nethserver-libvirt
Requires:   webvirtmgr

BuildRequires: perl
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
echo "%doc COPYING" >> %{name}-%{version}-filelist
grep -v -E '(gunicorn.conf.pyc|gunicorn.conf.pyo)' %{name}-%{version}-filelist > tmp-filelist
mv tmp-filelist %{name}-%{version}-filelist

%post

%preun

%files -f %{name}-%{version}-filelist
%defattr(-,root,root)

%changelog
